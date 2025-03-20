<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{ 
          // afficher la vue produit
    public function index()
    {
        $ingredients = Ingredients::paginate(10);
        return view('ingredients.index', compact('ingredients'));
    }
    // afficher la vue produit
    public function create()
    {
        return view('ingredients.create');
    }
}