<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model 
{
    protected $guarded = [];
    protected $table = 'filieres';
    public $timestamps = true;

    public function Departements()
    {
        return $this->belongsTo('App\Models\Departement', 'departement_id');
    }

    public function Niveaux()
    {
        return $this->hasMany('App\Models\Niveau', 'filiere_id');
    }

    public function TypeFilieres()
    {
        return $this->belongsTo('App\Models\TypeFiliere', 'type_filiere_id');
    }

    public function Etudiants()
    {
        return $this->hasMany('App\Models\Etudiant', 'filiere_id');
    }

}