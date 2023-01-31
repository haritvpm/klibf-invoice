<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSaleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_edit');
    }

    public function rules()
    {
        return [
            'publisher_id' => [
                'required',
                'integer',
            ],
            'invoice_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'invoice_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
