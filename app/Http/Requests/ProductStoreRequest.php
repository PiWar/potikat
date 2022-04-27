<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends RequestErrorStub
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
            "category_id" => "required|exists:categories,id",
            "img" => "required|file|mimes:jpg,png,jpeg",
            "title" => "required",
            "description" => "required",
            "sizes" => "required",
            "prices" => "required",
        ];
    }
}
