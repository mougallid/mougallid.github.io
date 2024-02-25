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
       'slogan',
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

    // relation entre la table categorie et la table produit 
    public function categorie()
    {
      return $this->belongsTo(Categorie::class, 'cate_id', 'id');    
    }
}
