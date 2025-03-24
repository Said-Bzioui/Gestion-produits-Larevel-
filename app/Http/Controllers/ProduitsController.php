<?php

namespace App\Http\Controllers;

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

    //delete function
    public function destroy(Produits $produits ,Request $request)
    {
        if (!$produits) {
            return redirect()->route('produits.index')->with('success', 'Product not found');
        }
        $produits->delete();
        return redirect()->route('produits.index')->with('success', 'produits deleted successfully');
    }
}
