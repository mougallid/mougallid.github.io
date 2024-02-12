<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'nom',
        'slug',
        'description',
        'statut',
        'populaire',
        'image',
        'meta_titre',
        'meta_description',
        'meta_mot_cle',
    ];
}
