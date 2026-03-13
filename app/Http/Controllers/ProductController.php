<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $pedidos = Order::with('user', 'orderItens.product')->where('id', 1)->get();
        return $pedidos;
    }
}
