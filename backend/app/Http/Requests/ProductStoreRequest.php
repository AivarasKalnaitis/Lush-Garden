<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Class ProductStoreRequest
 * @package App\Http\Requests
 */
class ProductStoreRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'price' => 'required|min:0.01',
            'vat' => 'required|in:21,5,0',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
            'categories' => 'nullable|array',
        ];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'title' => $this->getTitle(),
            'slug' => $this->getSlug(),
            'price' => $this->getPrice(),
            'vat' => $this->getVat(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
        ];
    }

    /**
     * @return array
     */
    public function getFeatureValues(): array
    {
        return $this->input('feature', []);
    }

    /**
     * @return array
     */
    public function getCatIds(): array
    {
        return $this->input('categories', []);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->input('title');
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        $slug = $this->input('slug');

        if (!$slug) {
            $slug = $this->getTitle();
        }

        return Str::slug($slug);
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return (float)$this->input('price');
    }

    /**
     * @return string
     */
    public function getVat(): string
    {
        return $this->input('vat', '21');
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->input('description');
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->input('quantity');
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage1(): ?UploadedFile
    {
        return $this->file('image1');
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage2(): ?UploadedFile
    {
        return $this->file('image2');
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage3(): ?UploadedFile
    {
        return $this->file('image3');
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage4(): ?UploadedFile
    {
        return $this->file('image4');
    }

    /**
     * @return UploadedFile|null
     */
    public function getImage5(): ?UploadedFile
    {
        return $this->file('image5');
    }
}
