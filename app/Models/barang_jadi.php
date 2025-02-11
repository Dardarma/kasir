<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang_jadi extends Model
{
    //

    protected $table = 'barang_jadis';
    protected $guarded = ['id'];

    public function log_barang_jadi()
    {
        return $this->hasMany(log_barang_jadi::class, 'id_barang_jadi', 'id');

    }

    public function stok_barang_jadi()
    {
        return $this->hasMany(stok_barang_jadi::class, 'id_barang_jadi', 'id');
    }   

    public function detail_penjualan()
    {
        return $this->hasMany(detail_penjualan::class, 'id_barang_jadi', 'id');
    }
}
