<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    // afficher la vue produit
    public function index()
    {
        return view('produit.index');
    }
    // afficher la vue produit
    public function create()
    {
        return view('produit.create');
    }
}