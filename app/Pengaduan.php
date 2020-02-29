<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
	protected $dates = ['tgl_pengaduan','tgl_tanggapan'];

	protected $fillable = [
        'tgl_pengaduan','nik', 'id_kategori','isi_laporan', 'foto','status'
    ];

    public function Kategori(){
    	return $this->belongsTo('App\Kategori','id_kategori');
    }
}
