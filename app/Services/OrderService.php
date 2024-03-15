<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;

class OrderService
{
    public function calculateTotalAmount(array $products)
    {
        $productIds = array_column($products, 'id');
        $productPrices = Product::whereIn('id', $productIds)->pluck('price', 'id');
        $totalAmount = 0;

        foreach ($products as $product) {
            $totalAmount += $productPrices[$product['id']] * $product['qty'];
        }

        return $totalAmount;
    }

    public function createOrder($totalAmount)
    {
        if ($totalAmount < 15) {
            throw new \Exception('The minimum order amount must be at least 15 EUR.');
        }

        return Order::create([
            'status' => 'pending',
            'user_id' => auth()->id(),
            'total_amount' => $totalAmount
        ]);
    }

    public function attachProducts($order, $products)
    {
        $productIds = array_column($products, 'id');

        $order->products()->attach($order->id, [
            'product_id' => 1,
            'count' => 10,
            'amount' => 100
        ]);
    }
}
