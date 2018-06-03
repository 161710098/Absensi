<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
     protected $table = 'orang_tuas';
    protected $fillable = ['nama_ortu', 'alamat','no_hp','id_user'];
    protected $visible = ['nama_ortu', 'alamat','no_hp','id_user'];
    public $timestamps = true;

    public function siswa()
    {
    	return $this->hasMany('App\siswa', 'id_ortu');
    }

    public function absensi()
    {
     	return $this->belongsTo('App\absensi', 'id_ortu');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}


