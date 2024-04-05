<?php

namespace App\Services; 

use App\Repositories\JadwalRepository;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalService
{
    private $jadwalRepository;

    public function __construct(JadwalRepository $jadwalRepository)
    {
        $this->jadwalRepository = $jadwalRepository;
    }

    public function importJadwal($requestData)
    {
        try {
            // Simpan data yang akan diimpor
            $importedData = Excel::toArray(new UsersImport, $requestData['file'])[0];

            return $this->jadwalRepository->importJadwal($importedData);
        } catch (\Exception $e) {
            return [
                "statusCode" => 401,
                "message" => $e->getMessage()
            ];
        }
    }
}