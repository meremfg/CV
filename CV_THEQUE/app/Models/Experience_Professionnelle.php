<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience_Professionnelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'DateDebut',
        'DateFin',
        'Societe',
        'Mission',
        'Duree',
        'cv_id',


    ];
}
