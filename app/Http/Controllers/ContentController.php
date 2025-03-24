<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    // afficher la vue produit
    public function index()
    {
        $categories = Category::limit(5)->get();
        return view('content.index', compact('categories'));
    }
}
