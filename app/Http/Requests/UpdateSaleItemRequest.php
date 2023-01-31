<?php

namespace App\Http\Requests;

use App\Models\SaleItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSaleItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_item_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
