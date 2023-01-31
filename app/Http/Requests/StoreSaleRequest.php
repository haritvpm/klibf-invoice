<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSaleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_create');
    }

    public function rules()
    {
        return [
            'publisher_id' => [
                'required',
                'integer',
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
