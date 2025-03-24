<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slideinfo;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    // afficher la vue produit
    public function index()
    {
        $categories = Category::limit(5)->get();
        $slideinfo = Slideinfo::all();
        return view('content.index', compact('categories', 'slideinfo'));
    }
    // store 
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required',
            'main_title' => 'required',
        ]);
        Slideinfo::create($validated);
        return redirect()->route('content.index')
            ->with('success', 'informations  created successfully.');
    }
    // update   
    public function update(Request $request, Slideinfo $slideinfo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'main_title' => 'required|string|max:255',
        ]);
        $slideinfo->update($validated);

        return redirect()->route('content.index')
            ->with('success', 'Informations updated successfully');
    }
    
}