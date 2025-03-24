<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::paginate(10);
        return view('promo.index', compact('promos'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'code' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100',
            'expired_at' => 'required|date',
        ]);

        Promo::create($validatedData);

        return redirect()->route('promo.index')->with('success', 'Promo created successfully.');
    }

    public function destroy(Promo $promo)
    {
        // dd($promo);
        $promo->delete();
        return to_route('promo.index')->with('success', 'Promo deleted successfully.');
    }
    public function update(Request $request, Promo $promo)
    {
        // dd($request);
        $validatedData = $request->validate([
            'code' => 'string|max:255',
            'discount' => 'numeric|min:0|max:100',
            'expired_at' => 'date',
            'active' => 'boolean',
        ]);
        // dd($validatedData);

        $promo->update($validatedData);

        return redirect()->route('promo.index')->with('success', 'Promo updated successfully.');
    }
}