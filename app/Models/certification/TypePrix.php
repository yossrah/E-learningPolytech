<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePrix extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'type_prixes';
    public $timestamps = true;
    protected $fillable = [ 'libelle'  ];
    

    public function Prixcertifs()
    {
        return $this->hasMany('App\Models\certification\PrixCertif', 'type_prixes_id');//envoyer le type_certifs_id chez SousTypeCertif
    }
    
}
