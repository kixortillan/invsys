<?php

namespace App\Http\Requests\Part;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrand extends FormRequest
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
            'name' => 'bail|required|alpha_dash|unique:part_brands,name|max:100',
            'description' => 'bail|present|nullable|max:64'
        ];
    }
}
