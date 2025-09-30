<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\SaleItem;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Só admin pode acessar
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Acesso negado');
        }

        // Total vendido por produto
        $productsSales = SaleItem::with('product')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(quantity * price) as total_value'))
            ->groupBy('product_id')
            ->get();

        // Total vendido por frentista
        $usersTotals = DB::table('sale_items')
            ->join('sales', 'sale_items.sale_id', '=', 'sales.id')
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->select(
                'users.id', 
                'users.name', 
                DB::raw('SUM(sale_items.quantity) as total_quantity'), 
                DB::raw('SUM(sale_items.quantity * sale_items.price) as total_value')
            )
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_quantity')
            ->get();

        // Top vendedor
        $topSeller = $usersTotals->first();

        // Total vendido por mês
        $monthly = DB::table('sale_items')
            ->select(
                DB::raw("YEAR(sale_items.created_at) as year"),
                DB::raw("MONTH(sale_items.created_at) as month"),
                DB::raw("SUM(sale_items.quantity * sale_items.price) as total_bruto"),
                DB::raw("SUM(sale_items.quantity) as total_items")
            )
            ->groupBy('year','month')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get();

        return view('admin.dashboard', compact('productsSales', 'usersTotals', 'topSeller', 'monthly'));
    }
}