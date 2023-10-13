<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursus extends Model 
{
    protected $guarded = [];
    protected $table = 'cursus';
    public $timestamps = true;

    public function Planetudes()
    {
        return $this->belongsTo('App\Models\PlanEtude', 'plan_etude_id');
    }

    public function AnneeUniversitaire()
    {
        return $this->belongsTo('App\Models\AnneUniversitaire', 'annee_universitaire_id');
    }

}