<?php

declare(strict_types = 1);

namespace App\DTO;

use App\DTO\Base\CollectionDTO;
use App\DTO\Base\DTO;
use App\Product;

/**
 * Class ProductDTO
 * @package App\DTO
 */
class ProductDTO extends DTO
{
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductDTO constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return array
     */
    protected function jsonData(): array
    {
        return [
            'id' => $this->product->id,
            'name' => $this->product->title,
            'slug' => $this->product->slug,
            'images' => $this->product->getAllImagesUrls(),
            'price' => $this->product->price,
            'categories' => $this->getCatTitles(),
            'vat' => $this->product->vat,
            'description' => $this->product->description,
            'inStock' => $this->product->quantity,
       ];
    }

    /**
     * @return array
     */
    private function getCatTitles(): array
    {
        return $this->product->categories->pluck('title')->toArray();
    }
}