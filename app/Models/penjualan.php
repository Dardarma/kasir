<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    //

    protected $table = 'penjualans';
    protected $guarded = ['id'];

    public function detail_penjualan()
    {
        return $this->hasMany(detail_penjualan::class, 'id_penjualan', 'id');
    }

    
    
}
