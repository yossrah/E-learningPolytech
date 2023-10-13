<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model 
{
    protected $guarded = [];
    protected $table = 'niveaux';
    public $timestamps = true;

    public function Class()
    {
        return $this->hasMany('App\Models\Groupe', 'niveau_id');
    }

    public function SousGroupes()
    {
        return $this->hasMany('App\Models\SousGroupe', 'niveau_id');
    }

}