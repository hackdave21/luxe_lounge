<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'description', 'categorie_id', 'image'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
