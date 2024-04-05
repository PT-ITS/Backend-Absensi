<?php

namespace App\Imports;

use App\Models\Jadwal;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Jadwal|null
     */
    public function model(array $row)
    {
        return new Jadwal([
           'tanggal'     => $row['tanggal'],
           'hari'    => $row['hari'],
           'status'    => $row['status'],
        ]);
    }
}