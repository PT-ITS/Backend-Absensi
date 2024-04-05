<?php

namespace App\Repositories;

use App\Models\Absensi;

class AbsensiRepository
{
    private $absensiModel;

    public function __construct(Absensi $absensiModel)
    {
        $this->absensiModel = $absensiModel;
    }

    public function absen($requestData)
    {
        $result = $this->absensiModel->insert($requestData);

        if($result){
            return [
                "statusCode" => 201,
                "message" => "Data absen gagal disimpan"
            ]; 
        }
        return [
            "statusCode" => 401,
            "message" => "Data absen gagal disimpan"
        ];
    }
}