<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousGroupeAffectation extends Model 
{
    protected $guarded = [];
    protected $table = 'sous_groupes_affectation';
    public $timestamps = true;

    public function Etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant', 'etudiant_id');
    }

    public function SousGroupe()
    {
        return $this->belongsTo('App\Models\SousGroupe', 'sous_groupe_id');
    }

}