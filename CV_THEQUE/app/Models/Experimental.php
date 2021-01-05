<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experimental extends Model
{
    use HasFactory;
    protected $fillable = [
        'DateDebut',
        'DateFin',
        'Societe',
        'cv_id',


    ];
}
