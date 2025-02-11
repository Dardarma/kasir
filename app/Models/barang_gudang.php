<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang_gudang extends Model
{
    //

    protected $table = 'barang_gudangs';
    protected $guarded = ['id'];

    public function satuan()
    {
        return $this->belongsTo(satuan::class, 'id_satuan', 'id');
    }

    public function harga_barang_gudang()
    {
        return $this->hasMany(harga_barang_gudang::class, 'id_barang_gudang', 'id'); 
    }    

    public function log_barang_gudang()
    {
        return $this->hasMany(log_barang_gudang::class, 'id_barang_gudang', 'id');
    }

    public function barang_masuk()
    {
        return $this->hasMany(barang_masuk::class, 'id_barang_gudang', 'id');
    }

    public function stok_barang_gudang()
    {
        return $this->hasMany(stok_barang_gudang::class, 'id_barang_gudang', 'id');
    }
 
    
}
