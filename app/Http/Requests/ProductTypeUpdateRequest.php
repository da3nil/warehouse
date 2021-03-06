<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeUpdateRequest extends FormRequest
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
            'name'  => 'string',
            'price' => 'int',
            'category_id' => 'int|exists:product_categories,id',
            'supplier_id'   => 'int|exists:suppliers,id',
            'description'   => 'string',
            'img'           => 'file|nullable'
        ];
    }
}
