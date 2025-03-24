<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'disc', 'emporter', 'livraison', 'ing_id', 'title'];
    public function categories()
    {
        return $this->belongsToMany(Category::class , 'category_produit', 'produit_id', 'category_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class, 'ingredient_produit', 'produit_id', 'ingredient_id');
    }
}