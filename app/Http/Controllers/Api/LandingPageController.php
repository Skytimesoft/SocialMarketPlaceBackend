<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSubscription;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use App\Filters\API\ProductFilter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\FilteredProductResource;

class LandingPageController extends Controller
{
    use ApiResponseHelpers;

    public function categories()
    {
        $categories = Category::with('childs')->paginate();

        return new CategoryCollection($categories);
    }

    public function productsFiltered(Request $request)
    {
        $filter = new ProductFilter();
        $queryItems = $filter->transform($request);
        $products = Product::orderBy('created_at', 'desc')->paginate(5);

        if (count($queryItems) == 0) {
            return FilteredProductResource::collection($products);
        }

        $products = Product::where($queryItems)->orderBy('created_at', 'desc')->paginate(5);

        return FilteredProductResource::collection($products);
    }

    public function subscribeProduct(Request $request)
    {
        if (!auth('sanctum')->check()) {
            return $this->respondUnAuthenticated();
        }

        $user = auth('sanctum')->user();

        if (!$user->hasRole('Buyer')) {
            return $this->respondForbidden();
        }

        $validatedData = $this->validate($request, [
            'product_id' => "required|numeric",
            'user_id' => "required|numeric",
        ]);

        try {
            ProductSubscription::create($validatedData);
        } catch (\Exception $e) {
            return $this->respondError('Already subscribed to product!');
        }

        return $this->apiResponse([
            'message' => 'Successfully subscribed to the product.'
        ]);
    }
}