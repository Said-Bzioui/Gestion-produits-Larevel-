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

    //store function
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'category_id' => 'required',
            'ingredients' => 'required|array',
            'ingredients.*' => 'required|exists:ingredients,id',
        ]);

        $produits = Produits::create($request->only('nom', 'prix', 'category_id'));

        $produits->ingredients()->attach($request->ingredients);

        return redirect()->route('produits.index')->with('success', 'produits created successfully');
    }
    // edit function
    public function edit(Produits $produits)
    {
        $ingredients = Ingredients::all();
        $categories = Category::all();
        return view('produit.edite', compact('produits', 'ingredients', 'categories'));
    }

    //delete function
    public function destroy(Produits $produits)
    {
        dd($produits);
        $produits->delete();
        return redirect()->route('produits.index')->with('success', 'produits deleted successfully');
    }
}