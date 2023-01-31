<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'hsn' => [
                'string',
                'nullable',
            ],
            'price' => [
                'required',
            ],
            'bookfests.*' => [
                'integer',
            ],
            'bookfests' => [
                'array',
            ],
        ];
    }
}
