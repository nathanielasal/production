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
        $post = Sumber::create([
            'nama_sumber' => $request->nama_sumber,
            'lokasi' => $request->lokasi,
            'jenis_produk' => $request->jenis_produk,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New Sumber created',
            'data' => [
                'sumber' => $sumber,
            ],
        ]);
    }

    public function getSumberById(Request $request)
    {
        $post = Sumber::find($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Sumber retrieved',
            'data' => [
                'sumber' => [
                    'id' => $post->id,
                    'nama_sumber' => $post->nama_sumber,
                    'lokasi' => $post->lokasi,
                    'jenis_produk' => $post->jenis_produk,
                    'hasil_produksi' => $post->hasil_produksi,
                    'tahun' => $post->tahun,
                ],
            ],
        ]);
    }

}
