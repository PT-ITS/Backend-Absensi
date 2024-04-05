<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JadwalService;

class JadwalController extends Controller
{
    private $jadwalService;

    public function __construct(JadwalService $jadwalService)
    {
        $this->jadwalService = $jadwalService;
    }

    public function importJadwal(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $result = $this->jadwalService->importJadwal($validateData);
        return response()->json(['message' => $result['message']], $result['statusCode']);
    }
}
