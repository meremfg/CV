<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nom',
        'prenom',
        'adresse',
        'CodePostale',
        'ville',
        'telephone',
        'DateDeNaissance',
        'StatuMarital',
        'PermisDeConduit',
        'cv_id',



    ];

}
