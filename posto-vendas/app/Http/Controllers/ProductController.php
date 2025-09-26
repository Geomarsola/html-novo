<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Modelo do Produto

class ProductController extends Controller
{
    public function index() // <- método que retorna a página
    {
        $products = Product::all(); // pega todos os produtos do banco

        // Aqui você retorna a view 'products.index' passando os produtos
        return view('products.index', compact('products'));
    }
}