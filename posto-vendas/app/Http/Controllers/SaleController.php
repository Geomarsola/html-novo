<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $productsInput = $request->input('products', []);
        if (!is_array($productsInput) || empty($productsInput)) {
            return redirect()->back()->withErrors('Nenhum produto informado.');
        }

        DB::beginTransaction();
        try {
            $sale = Sale::create(['user_id' => Auth::id()]);
            $totalValue = 0;
            $totalCommission = 0;
            $anyProduct = false;

            foreach ($productsInput as $productId => $quantity) {
                $quantity = intval($quantity);
                if ($quantity <= 0) continue;
                $anyProduct = true;

                $product = Product::lockForUpdate()->find($productId);
                if (!$product) {
                    DB::rollBack();
                    return redirect()->back()->withErrors("Produto (ID {$productId}) não encontrado.");
                }

                if ($product->stock < $quantity) {
                    DB::rollBack();
                    return redirect()->back()->withErrors("Estoque insuficiente para {$product->name}. Disponível: {$product->stock}.");
                }

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);

                $product->decrement('stock', $quantity);
                $totalValue += $quantity * $product->price;
                $totalCommission += $quantity * 3;
            }

            if (!$anyProduct) {
                DB::rollBack();
                return redirect()->back()->withErrors('Informe a quantidade de pelo menos 1 produto.');
            }

            DB::commit();
            return redirect()->route('sales.create')->with('success', "Venda registrada com sucesso! Valor bruto: R$ " . number_format($totalValue, 2, ',', '.') . " | Comissão: R$ " . number_format($totalCommission, 2, ',', '.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao salvar venda: ' . $e->getMessage());
        }
    }
}