<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nom','disc','m_title'];

    public function produits()
    {
        return $this->belongsToMany(Produits::class , 'category_produit', 'produit_id', 'category_id');
    }
}