<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class OrderStoreRequest
 * @package App\Http\Requests\API
 */
class OrderStoreRequest extends FormRequest
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
            'customer_title' => 'required|min:2|string',
            'customer_email' => 'required|email|string',
            'customer_phone' => 'nullable|string',
            'customer_address' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'user_id' => Auth::id(),
            'customer_title' => $this->input('customer_title'),
            'customer_email' => $this->input('customer_email'),
            'customer_phone' => $this->input('customer_phone'),
            'customer_address' => $this->input('customer_address'),
        ];
    }

    public function getItems(): array
    {
        return $this->input('items');
    }
}
