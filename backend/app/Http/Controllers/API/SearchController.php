<?php

namespace App\Http\Controllers\API;

use App\DTO\Base\CollectionDTO;
use App\DTO\Base\PaginateLengthAwareDTO;
use App\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\SearchRequest;
use App\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

/**
 * Class SearchController
 * @package App\Http\Controllers\API
 */
class SearchController extends Controller
{
    /**
     * @param SearchRequest $request
     * @return JsonResponse
     */
    public function search(SearchRequest $request): JsonResponse
    {
        $searchPhrase = $request->getQuery();
        $products = Product::query()
            ->with(['categories'])
            ->where('title', 'LIKE', $searchPhrase)
            ->orWhereHas('categories', function (Builder $q) use ($searchPhrase) {
                $q->where('title', 'LIKE', $searchPhrase);
            })
            ->orderByDesc('created_at')
            ->paginate();


        $paginateDTO = new PaginateLengthAwareDTO($products);
        $productsDTO = new CollectionDTO();

        foreach ($products as $product) {
            $productsDTO->pushItem(new ProductDTO($product));
        }

        $paginateDTO->setData($productsDTO);

        return response()->json($paginateDTO);
    }
}
