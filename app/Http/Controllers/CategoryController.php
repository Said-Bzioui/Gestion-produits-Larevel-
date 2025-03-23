<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // afficher la vue produit
    public function index(Request $request)
    {
        $search = $request->get('search');
        // dd($search);
        $categories = Category::where('nom', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(10);

        if ($request->ajax()) {
            return view('categories.index', compact('categories'));
        }

        return view('categories.index', compact('categories'));
    }

    // afficher la vue produit
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'disc' => 'required|string',
            'm_title' => 'required|string',

        ]);
        Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    
    public function update(Request $request, Category $category)
    {
        // dd($category);
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'disc' => 'required|string',
            'm_title' => 'required|string',
        ]);
        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}