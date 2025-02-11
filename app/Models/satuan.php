<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    //
    protected $table = 'satuans';
    protected $guarded = ['id'];

    public function barang_gudang()
    {
        return $this->hasMany(barang_gudang::class, 'id_satuan', 'id');
    }
}
