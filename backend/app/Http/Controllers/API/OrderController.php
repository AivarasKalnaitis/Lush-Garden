<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderStoreRequest;
use App\Order;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $orders = Order::query()
            ->where('user_id', '=', $userId)
            ->orderByDesc('created_at')
            ->paginate();

        return response()->json($orders);
    }

    public function store(OrderStoreRequest $request)
    {
        $order = Order::query()->create($request->getData());

        $items = $request->getItems();

        $productIds = array_column($items, 'product_id');
        $products = Product::query()->whereIn('id', $productIds)->get();

        foreach ($items as &$item) {
            /** @var Product $product */
            $product = $products->where('id', '=', $item['product_id'])->first();
            $item['title'] = $product->title;
            $item['price'] = $product->price;
            $item['vat'] = $product->vat;
        }

        $order->items()->createMany($items);

        return response()->json(['message' => 'OK']);
    }

    /**
     * method: GET
     * url: /api/order/{order}
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $userId = Auth::id();

        $order = Order::query()
            ->with('items')
            ->where('id', '=', $id)
            ->where('user_id',  '=', $userId)
            ->first();

        return response()->json($order);
    }
}
