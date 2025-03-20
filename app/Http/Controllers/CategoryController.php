<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // afficher la vue produit
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }
    // afficher la vue produit
    public function create()
    {
        return view('categories.create');
    }
}