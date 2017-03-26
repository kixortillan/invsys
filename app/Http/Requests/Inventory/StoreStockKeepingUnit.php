<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockKeepingUnit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'part_number' => 'bail|required|max:255',
            'brand' => 'bail|present|nullable|max:255',
            'pne_code' => 'bail|required|exists:part_number_extensions,code|max:30',
            'description' => 'bail|present|nullable|max:255',
            'is_hazardous' => 'bail|present|nullable|boolean',
            'has_expiration' => 'bail|present|nullable|boolean'
        ];
    }
}
