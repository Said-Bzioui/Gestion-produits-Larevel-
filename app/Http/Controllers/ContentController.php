<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
        // afficher la vue produit
        public function index()
        {
            return view('content.index');
        }
}