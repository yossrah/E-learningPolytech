<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulePlanEtude extends Model 
{   
    protected $guarded = [];
    protected $table = 'Modules_plan_etudes';
    public $timestamps = true;

    public function PlanEtudes()
    {
        return $this->belongsTo('App\Models\PlanEtude', 'plan_etude_id');
    }

    public function ModuleCursus()
    {
        return $this->hasMany('App\Models\ModuleCursus', 'module_plan_etude_id');
    }

}