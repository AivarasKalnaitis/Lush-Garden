<?php

namespace App\Http\Controllers\API;

use App\DTO\Base\CollectionDTO;
use App\DTO\Base\PaginateLengthAwareDTO;
use App\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\PaginateRequest;
use App\Product;
use Illuminate\Http\JsonResponse;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $query = Product::query()
            ->with(['categories'])
            ->orderBy('title');

        $products = $query->get();

        $productsDTO = new CollectionDTO();

        /** @var Product $product */
        foreach ($products as $product) {
            $productsDTO->pushItem(new ProductDTO($product));
        }

        return response()->json($productsDTO);
    }

    /**
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug): JsonResponse
    {
        $product = Product::query()
            ->where('slug', '=', $slug)
            ->firstOrFail();

        $productDTO = new ProductDTO($product);

        return response()->json($productDTO);
    }
}
