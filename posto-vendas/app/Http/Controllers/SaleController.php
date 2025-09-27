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
        // Recebe products => [product_id => quantidade]  OR products => [product_id => ['quantity'=>x] ]
        $productsInput = $request->input('products', []);

        if (!is_array($productsInput) || empty($productsInput)) {
            return redirect()->back()->withErrors('Nenhum produto informado.');
        }

        DB::beginTransaction();
        try {
            $sale = Sale::create(['user_id' => Auth::id()]);

            $totalValue = 0;
            $totalCommission = 0;

            foreach ($productsInput as $productId => $value) {
                // aceita dois formatos: quantity direto ou array ['quantity'=>x]
                $quantity = is_array($value) ? intval($value['quantity'] ?? 0) : intval($value);
                if ($quantity <= 0) {
                    continue;
                }

                $product = Product::lockForUpdate()->find($productId); // lock para concorrência
                if (!$product) {
                    DB::rollBack();
                    return redirect()->back()->withErrors("Produto (ID {$productId}) não encontrado.");
                }

                if ($product->stock < $quantity) {
                    DB::rollBack();
                    return redirect()->back()->withErrors("Estoque insuficiente para {$product->name}. Disponível: {$product->stock}.");
                }

                // cria item da venda
                SaleItem::create([
                    'sale_id'    => $sale->id,
                    'product_id' => $product->id,
                    'quantity'   => $quantity,
                    'price'      => $product->price,
                ]);

                // atualiza estoque
                $product->decrement('stock', $quantity);

                // acumula valores
                $totalValue += $quantity * $product->price;
                $totalCommission += $quantity * 3; // R$3 por item
            }

            DB::commit();

            $message = "Venda registrada com sucesso! Valor bruto: R$ " . number_format($totalValue, 2, ',', '.') .
                       " | Comissão (sua): R$ " . number_format($totalCommission, 2, ',', '.');

            return redirect()->route('sales.create')->with('success', $message);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao salvar venda: ' . $e->getMessage());
        }
    }
}