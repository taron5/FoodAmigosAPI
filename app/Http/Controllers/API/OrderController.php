<?php

namespace App\Http\Controllers\API;

use App\Constants\AuthConstants;
use App\Constants\ProductConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    use Access, HttpResponses;

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderRequest $request): JsonResponse
    {
        try {
            $products = $request->input('products');
            $productsTotalAmount = $this->orderService->calculateTotalAmount($products);

            $order = $this->orderService->createOrder($productsTotalAmount);

            $this->success($order, 'Order created successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
