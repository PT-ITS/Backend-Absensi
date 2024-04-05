<?php

namespace App\Repositories;

use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalRepository
{
    private $jadwalModel;

    public function __construct(Jadwal $jadwalModel)
    {
        $this->jadwalModel = $jadwalModel;
    }

    public function importJadwal($requestData)
    {
        $dataSaved = 0;
        foreach ($requestData as $data) {
            // Validasi format tanggal
            $tanggal = Carbon::createFromFormat('m/d/Y', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($data['tanggal'])->format('m/d/Y'));

            // Lakukan validasi atau manipulasi data sesuai kebutuhan
            $jadwal = new Jadwal([
                'tanggal'  => $tanggal->toDateString(),
                'hari' => $data['hari'],
                'status' => strval($data['status'])
            ]);

            
            // Coba simpan jadwal ke database
            if ($jadwal->save()) {
                // Jika berhasil
                $dataSaved++;
            } else {
                // Jika gagal disimpan ke database
                return [
                    "statusCode" => 401,
                    "message" => "Data jadwal gagal diimport"
                ];
            }
        }
        return [
            "statusCode" => 201,
            "message" => "$dataSaved data jadwal berhasil diimport"
        ];
    }
}

