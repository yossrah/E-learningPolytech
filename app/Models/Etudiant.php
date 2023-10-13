<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model 
{
    protected $guarded = [];
    protected $table = 'etudiants';
    public $timestamps = true;

    public function Filiere()
    {
        return $this->belongsTo('App\Models\Filiere', 'filiere_id');
    }

    public function Niveau()
    {
        return $this->belongsTo('App\Models\Niveau', 'niveau_id');
    }

    public function Passeport()
    {
        return $this->hasOne('App\Models\PasseportEtudiant', 'etudiant_id');
    }

    public function Groupe()
    {
        return $this->belongsTo('App\Models\Groupe', 'groupe_id');
    }

}