<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OrderUpdateRequest
 * @package App\Http\Requests
 */
class OrderUpdateRequest extends FormRequest
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
            'status' => 'required|in:unpaid,paid,processing,send,done',
            'customer_title' => 'required|min:2|string',
            'customer_email' => 'required|email|string',
            'customer_phone' => 'nullable|string',
            'customer_address' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'status' => $this->input('status'),
            'customer_title' => $this->input('customer_title'),
            'customer_email' => $this->input('customer_email'),
            'customer_phone' => $this->input('customer_phone'),
            'customer_address' => $this->input('customer_address'),
        ];
    }
}
