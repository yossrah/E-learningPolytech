<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model 
{
    protected $guarded = [];
    protected $table = 'parents';
    public $timestamps = true;

    public function Etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant', 'etudiant_id');
    }

}