<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function show($id)
    {
        try {
            $orders = Order::with('user', 'orderItens.product')
                ->where('id', $id)
                ->get();

            if ($orders->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'data' => $orders,
                    'message' => 'Pedido não encontrado'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'success' => true,
                'data' => $orders,
                'message' => 'Pedido encontrado!',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Erro ao recuperar pedido',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
