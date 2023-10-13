<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousTypeCertif extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sous-_type_certifs';
    public $timestamps = true;

    public function type()
    {
        return $this->belongsTo('App\Models\certification\TypeCertif', 'type_certifs_id');
    }
    public function Certifs()
    {
        return $this->hasMany('App\Models\certification\Certif', 'sousTypeCert_id');//belongs to
    }
}
