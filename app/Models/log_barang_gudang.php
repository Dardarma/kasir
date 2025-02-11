<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class log_barang_gudang extends Model
{
    //

    protected $table = 'log_barang_gudangs';
    protected $guarded = ['id'];

    public function barang_gudang()
    {
        return $this->belongsTo(barang_gudang::class, 'id_barang_gudang', 'id');
    }
}
