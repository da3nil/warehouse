<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name'  => 'required|string',
            'price' => 'required|int',
            'category_id' => 'required|int|exists:product_categories,id',
            'supplier_id'   => 'int|exists:suppliers,id',
            'description'   => 'required|string',
            'img'           => 'file|nullable',
            'qty'           => 'int',
            'location_id'   => 'required|int|exists:locations,id',
            'status_id'     => 'required|int|exists:statuses,id',
        ];
    }
}
