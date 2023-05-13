<?php

namespace App;

use App\Penyakit;
use App\BaseCaseGejala;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseCase extends Model
{
    protected $table = 'base_case';
    protected $primaryKey = 'id';

    protected $fillable = [
            'penyakit_id',
    ];

    public function penyakit()
    {
        return $this->hasOne(Penyakit::class, 'id', 'penyakit_id');
    }

    public function basecasegejala()
    {
        return $this->hasMany(BaseCaseGejala::class, 'base_case_id', 'id');
    }


}

