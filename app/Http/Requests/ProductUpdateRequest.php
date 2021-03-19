<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'type_id'       => 'int|exists:product_types,id',
            'qty'           => 'int',
            'location_id'   => 'int|exists:locations,id',
            'status_id'     => 'int|exists:statuses,id',
        ];
    }
}
