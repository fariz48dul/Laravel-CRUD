<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = 'tb_laptop';

    protected $fillable = [
        'nama', 'deskripsi', 'image', 'stok', 'harga', 'brand_id',
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
