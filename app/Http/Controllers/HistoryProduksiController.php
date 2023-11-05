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
        ], 200);
    }

    public function getAllHistoryProduksi()
    {
        $history_produksi = HistoryProduksi::all();

        return response()->json([
            'success' => true,
            'message' => 'All History grabbed',
            'data' => [
                'history' => $history_produksi
            ],
        ], 200);
    }

    public function getHistoryProduksiById(Request $request)
    {
        $historyProduksi = HistoryProduksi::find($request->id);

        return response()->json([
            'success' => true,
            'message' => 'History produksi retrieved',
            'data' => [
                'history' => [
                    'id' => $historyProduksi->id,
                    'hasil_produksi' => $historyProduksi->hasil_produksi,
                    'tahun' => $historyProduksi->tahun,
                    'sumberId' => $historyProduksi->sumberId,
                ],
            ],
        ], 200);
    }

    public function updateHistory(Request $request, $id) 
    {
        HistoryProduksi::where('id', $id)->update([
            'hasil_produksi' => $request->hasil_produksi,
            'tahun' => $request->tahun,
            'sumberId' => $request->sumberId
        ]);

        $newHistoryProduksi = HistoryProduksi::find($id);

        return response()->json([
            'status' => 'Success',
            'message' => 'History is updated',
            'data' => [
                'history_produksi' => $newHistoryProduksi,
            ],
        ], 200);
    }

    public function deleteHistory($id)
    {
        $historyProduksi = HistoryProduksi::find($id);
        $historyProduksi->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'History has been deleted',
            'data' => [
                'history_produksi' => $historyProduksi,
            ],
        ],200);
    }
}
