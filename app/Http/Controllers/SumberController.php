<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
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

    public function createSumber(Request $request)
    {
        $sumber = Sumber::create([
            'nama_sumber' => $request->nama_sumber,
            'lokasi' => $request->lokasi,
            'jenis_produk' => $request->jenis_produk,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New Sumber created',
            'data' => [
                'sumber' => $sumber
            ],
        ]);
    }

    public function getSumberById(Request $request)
    {
        $sumber = Sumber::find($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Sumber retrieved',
            'data' => [
                'sumber' => [
                    'id' => $sumber->id,
                    'nama_sumber' => $sumber->nama_sumber,
                    'lokasi' => $sumber->lokasi,
                    'jenis_produk' => $sumber->jenis_produk,
                    'hasil_produksi' => $sumber->hasil_produksi,
                    'tahun' => $sumber->tahun,
                ],
            ],
        ]);
    }

    public function updateSumber(Request $request, $id) 
    {
        Sumber::where('id', $id)->update([
            'nama_sumber' => $request->nama_sumber,
            'lokasi' => $request->lokasi,
            'jenis_produk' => $request->jenis_produk
        ]);

        $newSumber = Sumber::find($id);

        return response()->json([
            'status' => 'Success',
            'message' => 'New Sumber is updated',
            'data' => [
                'sumber' => $newSumber,
            ],
        ], 200);
    }

    public function deleteSumber($id)
    {
        $sumber = Sumber::find($id);
        $sumber->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Sumber has been deleted',
            'data' => [
                'sumber' => $sumber,
            ],
        ],200);
    }
}
