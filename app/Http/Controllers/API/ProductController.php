<?php

namespace App\Http\Controllers\API;

use App\Constants\AuthConstants;
use App\Constants\ProductConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    use Access, HttpResponses;

    public function getProducts(): JsonResponse
    {
        return $this->success(ProductResource::collection(Product::get()), 'Products retrieved successfully');
    }
}
