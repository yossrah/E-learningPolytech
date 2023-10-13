<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasseportEtudiant extends Model 
{
    protected $guarded = [];
    protected $table = 'passeport_etudiants';
    public $timestamps = true;

    public function Etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant', 'etudiant_id');
    }

}