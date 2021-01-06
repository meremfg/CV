<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV_Collection extends Model
{
    use HasFactory;
    protected $fillable = [

        'lien',
        'titre',



    ];
}
