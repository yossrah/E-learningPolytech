<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeFiliere extends Model 
{
    protected $guarded = [];
    protected $table = 'types_filieres';
    public $timestamps = true;

    public function Filieres()
    {
        return $this->hasMany('App\Models\Filiere', 'type_filiere_id');
    }

}