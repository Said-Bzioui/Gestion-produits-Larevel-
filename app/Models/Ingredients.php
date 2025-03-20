<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;
    protected $fillable = ['fr_nom', 'en_nom', 'nl_nom'];

    public function produits()
    {
        return $this->belongsToMany(Produits::class, 'ingredient_produit', 'ingredient_id', 'produit_id');
    }
}