<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $fillable = [
       'cate_id',
       'nom',
       'marque',
      'déscription',
       'prix_original',
       'prix_remise',
       'quantite',
       'taxe',
       'statut',
       'tendance',
       'meta_titre',
       'meta_mot_cle',
       'image',
    ];
}
