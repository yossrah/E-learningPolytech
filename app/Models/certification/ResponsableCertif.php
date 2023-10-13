<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableCertif extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'responsable_certifs';
    public $timestamps = true;
    
    public function Users()
    {
        return $this->belongsTo('App\Models\UserPublic', 'users_id');
    }
}
