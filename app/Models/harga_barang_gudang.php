<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class harga_barang_gudang extends Model
{
    //

    protected $table = 'harga_barang_gudangs';
    protected $guarded = ['id'];
    

    public function barang_gudang()
    {
        return $this->belongsTo(barang_gudang::class, 'id_barang_gudang', 'id'); 
    }
    
}
