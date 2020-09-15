<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = 'telepon';
    protected $primaryKey = 'id_anak';
    protected $fillable = ['id_anak','nomor_telepon'];

    public function anak() {
    	return $this->belongsTo('App\Anak', 'id_anak');
    }
}
