<?php

namespace App\Services;

use App\Repositories\AbsensiRepository;

class AbsensiService
{
    private $absensiRepository;

    public function __construct(AbsensiRepository $absensiRepository)
    {
        $this->absensiRepository = $absensiRepository;
    }

    public function absen($dataRequest)
    {
        return $this->absensiRepository->absen($dataRequest);
    }
}