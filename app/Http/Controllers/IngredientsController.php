<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    // afficher la vue produit
    public function index()
    {
        $ingredients = Ingredients::latest()->paginate(10);
        return view('ingredients.index', compact('ingredients'));
    }
    // store function
    public function store(Request $request)
    {
        $request->validate([
            'fr_nom' => 'required',
            'en_nom' => 'required',
            'nl_nom' => 'required',
        ]);
        Ingredients::create($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingredient created successfully.');
    }

    //edit function
    public function edit(Ingredients $ingredient)
    {
        return view('ingredients.edite', compact('ingredient'));
    }
    //update function
    public function update(Request $request, Ingredients $ingredient)
    {
        $request->validate([
            'fr_nom' => 'required',
            'en_nom' => 'required',
            'nl_nom' => 'required',
        ]);
        $ingredient->update($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully');
    }
    //delete function
    public function destroy(Ingredients $ingredient)
    {
        // dd($request);
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully');
    }
}