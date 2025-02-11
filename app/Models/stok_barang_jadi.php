<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stok_barang_jadi extends Model
{
    //
    protected $table = 'stok_barang_jadis';
    protected $guarded = ['id'];

    public function barang_jadi()
    {
        return $this->belongsTo(barang_jadi::class, 'id_barang_jadi', 'id');
    }
}
