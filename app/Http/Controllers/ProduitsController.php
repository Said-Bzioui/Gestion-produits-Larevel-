<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search', ''); 

        $produits = Produits::when($search, function ($query, $search) {
            return $query->where('nom', 'like', '%' . $search . '%');
        })->latest()->paginate(10);

        $categories = Category::limit(5)->with('produits')->get();

        if ($request->ajax()) {
            return view('produit.index', compact('produits', 'categories'));
        }

        return view('produit.index', compact('produits', 'categories'));
    }



    public function create()
    {
        $ingredients = Ingredients::all();
        $categories = Category::all();
        return view('produit.create', compact('ingredients', 'categories'));
    }

    //delete function
    public function destroy(Produits $produits, Request $request)
    {
        if (!$produits) {
            return redirect()->route('produits.index')->with('success', 'Product not found');
        }
        $produits->delete();
        return redirect()->route('produits.index')->with('success', 'produits deleted successfully');
    }
}