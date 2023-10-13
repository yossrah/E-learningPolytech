<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSousGroupe extends Model 
{
    protected $guarded = [];
    protected $table = 'type_sous_groupes';
    public $timestamps = true;

    public function SousGroupes()
    {
        return $this->hasMany('App\Models\SousGroupe', 'type_sous_groupe_id');
    }

}