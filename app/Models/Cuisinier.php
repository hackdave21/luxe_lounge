<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisinier extends Model
{
     use HasFactory;

    protected $fillable = [
        'nom',
        'specialite',
        'description',
        'photo',
        'experience',
        'distinctions'
    ];
}
