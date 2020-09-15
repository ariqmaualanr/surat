<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $dates = ['tanggal_lahir'];
    protected $table = 'anak';
    protected $fillable=[

'kms',
'nama_anak',
'tanggal_lahir',
'jenis_kelamin',
'nama_ibu',
'id_bidan',
'foto'

    ];

    public function getNamaanakAttribute($nama_anak) {
        return ucwords($nama_anak);
    }

    public function setNamaanakAttribute($nama_anak){
    $this->attributes['nama_anak']= strtolower($nama_anak);
    }

    public function telepon() {
        return $this->hasOne('App\Telepon', 'id_anak');
    }

    public function bidan() {
        return $this->belongsTo('App\Bidan', 'id_bidan');
    }
    
}