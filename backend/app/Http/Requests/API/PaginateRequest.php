<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PaginateRequest
 * @package App\Http\Requests\API
 */
class PaginateRequest extends FormRequest
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
            'page' => 'sometimes|integer|min:1',
            'perPage' => 'sometimes|integer|min:6',
            'orderBy' => 'nullable|string',
            'orderType' => 'nullable|in:desc,asc',
        ];
    }

    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        $perPage = $this->input('perPage');

        if ($perPage !== null) {
            return (int)$perPage;
        }

        return null;
    }

    /**
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->input('orderBy', 'created_at');
    }

    /**
     * @return string
     */
    public function getOrderType(): string
    {
        $orderType = $this->input('orderType');

        if ($orderType === null) {
            return 'desc';
        }

        return $orderType;
    }

}
