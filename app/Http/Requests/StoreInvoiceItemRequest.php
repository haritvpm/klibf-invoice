<?php

namespace App\Http\Requests;

use App\Models\InvoiceItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_item_create');
    }

    public function rules()
    {
        return [
            'publisher_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'bill_number' => [
                'string',
                'required',
            ],
            'bill_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'invoice_list_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
