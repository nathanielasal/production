<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;

class ProduksiController extends Controller
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

    public function createProduksi(Request $request)
    {
        $produksi = Produksi::create([
            'target' => $request->target,
            'progress' => $request->progress,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New product created',
            'data' => [
                'produksi' => $produksi,
            ],
        ], 200);
    }

    public function getAllProduksi()
    {
        $produksi = Produksi::all();

        return response()->json([
            'success' => true,
            'message' => 'All product grabbed',
            'data' => [
                'produksi' => $produksi
            ],
        ], 200);
    }

    public function getProduksiById(Request $request)
    {
        $produksi = Produksi::find($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Product has been retrieved',
            'data' => [
                'produksi' => [
                    'id' => $produksi->id,
                    'target' => $produksi->target,
                    'progress' => $produksi->progress,
                    'sumber' => $produksi->sumber, //response sumber
                ]
            ],
        ], 200);
    }

    public function updateProduksi(Request $request, $id) 
    {
        Produksi::where('id', $id)->update([
            'target' => $request->target,
            'progress' => $request->progress,
        ]);

        $newProduksi = Produksi::find($id);

        return response()->json([
            'status' => 'Success',
            'message' => 'Product is updated',
            'data' => [
                'produksi' => $newProduksi,
            ],
        ], 200);
    }

    public function deleteProduksi($id)
    {
        $produksi = Produksi::find($id);
        $produksi->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Product has been deleted',
            'data' => [
                'produksi' => $produksi,
            ],
        ],200);
    }

    public function addSumber(Request $request)
    {
        $produksi = Produksi::find($request->id);
        $produksi->sumber()->attach($request->sumberId);
        return response()->json([
            'success' => true,
            'message' => 'Sumber added to produksi',
        ]);
    }

}
