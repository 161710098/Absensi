<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
     protected $fillable = ['id_siswa','keterangan','tgl','id_kelas','id_ortu'];

    public function siswa()
    {
    	return $this->belongsTo('App\siswa','id_siswa');
    }

 	public function orangtua()
     {
     	return $this->belongsTo('App\orangtua', 'id_ortu');
     }
    public function kelas()
     {
     	return $this->belongsTo('App\Kelas', 'id_kelas');
     }

}
