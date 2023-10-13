<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertifUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'certif_users';
    public $timestamps = true;

    public function Enseignant()
    {
        return $this->belongsTo('App\Models\certification\ResponsableCertif', 'certif_users_id');
    }
    public function Année()
    {
        return $this->belongsTo('App\Models\AnneUniversitaire', 'annes_universitaire');
    }
    public function Prixcertif()
    {
        return $this->belongsTo('App\Models\certification\PrixCertif', 'prix_certifs');
    }
    public function Certif()
    {
        return $this->belongsTo('App\Models\certification\Certif', 'certifs_id');
    }
}
