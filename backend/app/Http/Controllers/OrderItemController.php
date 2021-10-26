<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemUpdateRequest;
use App\OrderItem;
use App\Product;
use Illuminate\Http\RedirectResponse;

class OrderItemController extends Controller
{
    public function edit(int $orderId, int $orderItemId)
    {
        $item = OrderItem::query()
            ->where('order_id', '=', $orderId)
            ->where('id', '=', $orderItemId)
            ->firstOrFail();

        $products = Product::query()->select(['id', 'title', 'price', 'vat'])->orderBy('title')->get();

        return view('orders.items.form', [
            'item' => $item,
            'products' => $products,
        ]);
    }

    /**
     * @param OrderItemUpdateRequest $request
     * @param int $orderId
     * @param int $orderItemId
     * @return RedirectResponse
     */
    public function update(OrderItemUpdateRequest $request, int $orderId, int $orderItemId): RedirectResponse
    {
        OrderItem::query()
            ->where('order_id', '=', $orderId)
            ->where('id', '=', $orderItemId)
            ->update($request->getData());

        return redirect()->route('orders.edit', ['order' => $orderId])
            ->with('status', 'Item updated.');
    }
}
