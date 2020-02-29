<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama_kategori',
    ];

    public function Pengaduan(){
    	return $this->hasMany('App\Pengaduan','id_kategori');
    }
}
