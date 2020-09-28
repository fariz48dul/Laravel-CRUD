<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tb_brand';

    protected $fillable = [
        'nama', 'alamat', 'phone',
    ];

    public function laptop()
    {
        return $this->hasMany('App\Laptop');
    }
}
