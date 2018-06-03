<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable=['id_jurusan','nama_kelas','walikelas'];
    protected $visible=['id_jurusan','nama_kelas','walikelas'];
    public $timestamps=true;

    public function jurusan()
    {
    	return $this->belongsTo('App\jurusan','id_jurusan');
    }

    public function siswa()
    {
    	return $this->hasMany('App\siswa','id_kelas');
    }

    public function absensi()
    {
        return $this->hasMany('App\Absensi','id_kelas');
    }
}
?>
