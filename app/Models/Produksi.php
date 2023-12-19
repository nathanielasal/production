<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target', 'progress'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    // public function sumber()
    // {
    //     return $this->belongsTo(Sumber::class, 'sumberId');
    // }
    public function sumber()
    {
        return $this->belongsToMany(Sumber::class, 'produksi_sumbers', 'produksiId', 'sumberId');
    }
    
}
