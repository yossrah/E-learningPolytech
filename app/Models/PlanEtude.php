<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanEtude extends Model 
{
    protected $guarded = [];
    protected $table = 'plan_etudes';
    public $timestamps = true;

    public function Ecoles()
    {
        return $this->belongsTo('App\Models\Ecole', 'ecole_id');
    }

    public function Departements()
    {
        return $this->belongsTo('App\Models\Departement', 'departement_id');
    }

    public function TypeFilieres()
    {
        return $this->belongsTo('App\Models\TypeFiliere', 'type_filiere_id');
    }

    public function ModulesPlanEtudes()
    {
        return $this->hasMany('App\Models\ModulePlanEtude', 'plan_etude_id');
    }

    public function Filieres()
    {
        return $this->belongsTo('App\Models\Filiere', 'filiere_id');
    }

    public function Niveaux()
    {
        return $this->belongsTo('App\Models\Niveau', 'niveau_id');
    }

    public function Cursus()
    {
        return $this->hasMany('App\Models\Cursus', 'plan_etude_id');
    }

}