<?php

namespace App\Http\Requests;

use App\Category;

class CategoryUpdateRequest extends CategoryStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }

    /**
     * @return bool
     */
    protected function slugExists(): bool
    {
        return Category::query()
            ->where('slug', '=', $this->getSlug())
            ->where('id', '!=', $this->route()->parameter('category')->id)
            ->exists();
    }
}
