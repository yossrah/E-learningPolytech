<?php

namespace App\Models\certification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixCertif extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'prix_certifs';
    public $timestamps = true;
    public function Typeprix()
    {
        return $this->belongsTo('App\Models\certification\TypePrix', 'type_prixes_id');
    }
    public function Certif()
    {
        return $this->belongsTo('App\Models\Certif', 'certifs_id');
    }

    
}
