<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $products = Product::query()->paginate();

        return view('products.list', ['list' => $products]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $categories = Category::query()
            ->pluck('title', 'id');

        return view('products.form', [
            'categories' => $categories,
        ]);
    }

    /**
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $product = Product::query()->create($request->getData());

        if ($image = $request->getImage1()) {
            $product->addMedia($image)->toMediaCollection('product_images');
        }

        if ($image = $request->getImage2()) {
            $product->addMedia($image)->toMediaCollection('product_images');
        }

        if ($image = $request->getImage3()) {
            $product->addMedia($image)->toMediaCollection('product_images');
        }

        if ($image = $request->getImage4()) {
            $product->addMedia($image)->toMediaCollection('product_images');
        }

        if ($image = $request->getImage5()) {
            $product->addMedia($image)->toMediaCollection('product_images');
        }

        $product->categories()->sync($request->getCatIds());

        return redirect()->route('products.index')
            ->with('status', 'Created.');
    }

    public function edit(Product $product): View
    {
        $categoriesIds = $product->categories->pluck('id')->toArray();

        $categories = Category::query()
            ->pluck('title', 'id');

        return view('products.form', [
            'item' => $product,
            'categoryIds' => $categoriesIds,
            'categories' => $categories,
        ]);
    }

    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->getData());

        $product->categories()->sync($request->getCatIds());

        if ($image = $request->getImage1()) {
            $product->addMedia($image)->toMediaCollection('product_images');
        }

        return redirect()->route('products.index')
            ->with('status', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('status', 'Product deleted.');
    }
}
