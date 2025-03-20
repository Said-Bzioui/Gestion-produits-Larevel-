<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    // afficher la vue produit
    public function index()
    {
        $produits = Produits::paginate(5);
        $ingred = Ingredients::all();
        return view('produit.index', compact('produits','ingred'));
    }
    // afficher la vue produit
    public function create()
    {
        return view('produit.create');
    }
}