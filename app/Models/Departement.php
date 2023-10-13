<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model 
{
    protected $guarded = [];
    protected $table = 'departements';
    public $timestamps = true;

    public function Planetudes()
    {
        return $this->hasMany('App\Models\PlanEtude', 'departement_id');
    }

    public function Fileres()
    {
        return $this->hasMany('App\Models\Filiere', 'departement_id');//envoyer le dep id
    }

}