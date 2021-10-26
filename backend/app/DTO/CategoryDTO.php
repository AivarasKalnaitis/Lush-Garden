<?php

declare(strict_types = 1);

namespace App\DTO;

use App\Category;
use App\DTO\Base\DTO;

/**
 * Class CategoryDTO
 * @package App\DTO
 */
class CategoryDTO extends DTO
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryDTO constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    protected function jsonData(): array
    {
        return [
            'name' => $this->category->title,
            'slug' => $this->category->slug,
        ];
    }
}