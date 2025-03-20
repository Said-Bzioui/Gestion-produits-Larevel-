<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Catigorie;
use App\Models\Ingredients;
use App\Models\Produits;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء 10 فئات
        $categories = Category::factory(10)->create();
    
        // إنشاء 10 مكونات
        $ingredients = Ingredients::factory(10)->create();
    
        // إنشاء 10 منتجات
        $produits = Produits::factory(10)->create();
    
        // ربط كل منتج بفئة عشوائية
        foreach ($produits as $produit) {
            $produit->category()->associate($categories->random())->save();
        }
    
        // ربط كل منتج بعدد من المكونات العشوائية
        foreach ($produits as $produit) {
            $produit->ingredients()->attach(
                $ingredients->random(3)->pluck('id')->toArray()
            );
        }
    }
    
}