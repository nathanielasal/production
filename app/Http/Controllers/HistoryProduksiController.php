<?php

namespace App\Http\Controllers;

use App\Models\HistoryProduksi;
use Illuminate\Http\Request;

class HistoryProduksiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createHistory(Request $request)
    {
        $history_produksi = HistoryProduksi::create([
            'hasil_produksi' => $request->hasil_produksi,
            'tahun' => $request->tahun,
            'sumberId' => $request->sumberId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New history created',
            'data' => [
                'history_produksi' => $history_produksi,
            ],
        ]);
    }
}
