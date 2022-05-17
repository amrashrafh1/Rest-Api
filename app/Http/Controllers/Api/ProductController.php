<?php

namespace App\Http\Controllers\Api;

use App\Contract\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    use ApiResponse;
    
    public function index()
    {
        return $this->sendResult('success', Product::paginate(10), null, true);
    }

    public function show(Product $product)
    {
        return $this->sendResult('success', $product, null, true);
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());

            return $this->sendResult('Product stored successfully', $product, null, true);

        } catch (\Exception$exception) {

            return $this->sendResult('Error', null, "Invalid data - {$exception->getMessage}", 400);
        }
    }
}
