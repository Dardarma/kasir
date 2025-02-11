<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    //

    protected $table = 'barang_masuks';
    protected $guarded = ['id'];

    public function barang_gudang()
    {
        return $this->belongsTo(barang_gudang::class, 'id_barang_gudang', 'id');
    }
    
}
