<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'disc', 'emporter', 'livraison', 'ing_id', 'title'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class, 'ingredient_produit', 'produit_id', 'ingredient_id');
    }
}