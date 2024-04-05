<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AbsensiService;

class AbsensiController extends Controller
{
    private $absensiService;

    public function __construct(AbsensiService $absensiService)
    {
        $this->absensiService = $absensiService;
    }

    public function absen(Request $request)
    {
        $validateData = $request->validate([
            'pegawai_id' => 'required',
            'jadwal_id' => 'required',
            'jam_absen' => 'required',
            'koordinat_absen' => 'required',
            'alamat_absen' => 'required',
            'jenis_absen' => 'required',
        ]);

        $result = $this->absensiService->absen($validateData);
        return response()->json(['message' => $result['message']], $result['statusCode']);
    }
}

