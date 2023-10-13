<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model 
{
    protected $guarded = [];
    protected $table = 'groupes';
    public $timestamps = true;

    public function Niveau()
    {
        return $this->belongsTo('App\Models\Niveau', 'niveau_id');
    }

    public function Filiere()
    {
        return $this->belongsTo('App\Models\Filiere', 'filiere_id');
    }

    public function Etudiants()
    {
        return $this->hasMany('App\Models\Etudiant', 'groupe_id');
    }

    public function TypeCertif()
    {
        return $this->hasMany('App\Models\certification\TypeCertif', 'typecertif_id');
    }

}