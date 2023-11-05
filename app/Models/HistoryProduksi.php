<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryProduksi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hasil_produksi',
        'tahun',
        'sumberId'
    ];

    protected $hidden = [];

    public function sumber()
    {
        return $this->belongsTo(Sumber::class, $sumberId);
    }
}
