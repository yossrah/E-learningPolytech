<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model 
{
    protected $guarded = [];
    protected $table = 'ecoles';
    public $timestamps = true;

    public function Departements()
    {
        return $this->hasMany('App\Models\Departement', 'ecole_id');
    }

}