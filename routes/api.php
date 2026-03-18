<?php

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/teste', function (Request $request) {
    try {
        $orders = Order::with('user', 'orderItens.product')
            ->where('id', $request->id)
            ->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'success' => false,
                'error' => 'Pedido não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $orders, 
        ], Response::HTTP_OK);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => 'Erro ao recuperar pedido',
            'message' => $e->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
});
