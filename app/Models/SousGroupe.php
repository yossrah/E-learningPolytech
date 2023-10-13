<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousGroupe extends Model 
{
    protected $guarded = [];
    protected $table = 'sous_groupes';
    public $timestamps = true;

    public function TypeSousGroupe()
    {
        return $this->belongsTo('App\Models\TypeSousGroupe', 'type_sous_groupe_id');
    }

    public function SousGroupesAffectation()
    {
        return $this->hasMany('App\Models\SousGroupeAffectation', 'sous_groupe_id');
    }

    public function Niveau()
    {
        return $this->belongsTo('App\Models\Niveau', 'niveau_id');
    }

}