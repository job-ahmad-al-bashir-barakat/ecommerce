<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'     => 'required',
            'category_type'    => 'required',
            'author'           => 'required',
            'publisher'        => 'required',
            'author_role'      => 'required',
            'publisher_role'   => 'required|min:0',
            'selling_price'    => 'required|min:0',
            'cost_price'       => 'required',
            'product_type'     => 'required',
        ];
    }
}
