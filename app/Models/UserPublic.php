<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPublic extends Model 
{
    protected $guarded = [];
    protected $table = 'users_public';
    public $timestamps = true;

    public function Responsables()
    {
        return $this->hasMany('App\Models\certification\ResponsableCertif', 'users_id');
    }

}