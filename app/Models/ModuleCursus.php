<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleCursus extends Model 
{
    protected $guarded = [];
    protected $table = 'module_cursus';
    public $timestamps = true;

    public function Cursus()
    {
        return $this->belongsTo('App\Models\Cursus', 'cursus_id');
    }

    public function Semestre()
    {
        return $this->belongsTo('App\Models\Semestre', 'semestre_id');
    }

}