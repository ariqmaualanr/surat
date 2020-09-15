<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $table = 'bidan';

    protected $fillable = ['nama_bidan'];

    public function anak() {
    	return $this->hasMany('App\Anak', 'id_bidan');
    }
}
