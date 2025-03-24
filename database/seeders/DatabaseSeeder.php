<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\Produits;
use App\Models\Promo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $promos = Promo::factory()->count(10)->create();
    
        $categories = Category::factory(10)->create();
    
        $ingredients = Ingredients::factory(10)->create();
    
        $produits = Produits::factory(10)->create();
    
        foreach ($produits as $produit) {
            $produit->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        }
    
        foreach ($produits as $produit) {
            $produit->ingredients()->attach(
                $ingredients->random(3)->pluck('id')->toArray()
            );
        }
    }
    
}