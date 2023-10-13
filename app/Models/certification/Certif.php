<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certif extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'certifs';
    public $timestamps = true;

    public function soustype()
    {
        return $this->belongsTo('App\Models\certification\SousTypeCertif', 'type_certifs_id');
    }
    public function PrixesCertifs()
    {
        return $this->hasMany('App\Models\certification\PrixCertif', 'certifs_id');//envoyer le type_certifs_id chez SousTypeCertif
    }
    public function RespoCertifs()
    {
        return $this->hasMany('App\Models\certification\ResponsableCertif', 'certifs_id');
    }
}
