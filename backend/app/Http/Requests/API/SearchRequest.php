<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchRequest
 * @package App\Http\Requests\API
 */
class SearchRequest extends FormRequest
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
            'query' => "required|min:3|string",
        ];
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return '%'.$this->input('query').'%';
    }
}
