<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $produits = Produits::where('nom', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(10);

        if ($request->ajax()) {
            return view('produit.index', compact('produits'));
        }

        return view('produit.index', compact('produits'));
    }

    public function create()
    {
        return view('produit.create');
    }
}