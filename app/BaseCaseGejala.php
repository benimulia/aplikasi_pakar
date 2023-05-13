<?php

namespace App;

use App\Gejala;
use Illuminate\Database\Eloquent\Model;

class BaseCaseGejala extends Model
{
    protected $table = 'base_case_gejala';
    protected $primaryKey = 'id';

    protected $fillable = [
        'base_case_id',
        'gejala_id',
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id', 'id');
    }


    public function basecase()
    {
        return $this->hasOne(BaseCase::class, 'id', 'base_case_id');
    }


}