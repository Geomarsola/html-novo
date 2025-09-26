<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;

class SaleController extends Controller
{
    public function create()
    {
        $products = \App\Models\Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $sale = Sale::create();

        foreach ($request->products as $productId => $quantity) {
            if ($quantity > 0) {
                $product = \App\Models\Product::find($productId);
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Venda registrada com sucesso!');
    }
}
