<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV_Relation_Collection extends Model
{
    use HasFactory;
    protected $fillable = [

        'cv_id',
        'cvCollection_id',
        ' recruteur_id',

    ];
}
