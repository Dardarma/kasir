<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    //
    protected $table = 'detail_penjualans';
    protected $guarded = ['id'];

    public function barang_jadi()
    {
        return $this->belongsTo(barang_jadi::class, 'id_barang_jadi', 'id');
    }
    
    public function penjualan()
    {
        return $this->belongsTo(penjualan::class, 'id_penjualan', 'id');
    }
}
