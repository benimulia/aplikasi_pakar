<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelamin extends Model
{
    protected $table = 'kelamin';

    public function pasien(){
        return $this->hasMany('App\Pasien', 'id_pasien', 'id');
    }

}
