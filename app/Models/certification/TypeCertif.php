<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCertif extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'type_certifs';
    public $timestamps = true;
    protected $fillable = [ 'libelle', 'gratuite', 'type_certifs_id' ];
    

    public function SousTypeCertifs()
    {
        return $this->hasMany('App\Models\certification\SousTypeCertif', 'type_certifs_id');//envoyer le type_certifs_id chez SousTypeCertif
    }
    
    
}
