<?php

namespace App\Http\Requests;

use App\Models\InvoiceList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_list_create');
    }

    public function rules()
    {
        return [
            'member_fund_id' => [
                'required',
                'integer',
            ],
            'institution_type' => [
                'required',
            ],
            'institution_name' => [
                'string',
                'required',
            ],
           
////////////////////////
            'publisher_id' => [
                'required',
            ],
            'bill_number' => [
                'required',
            ],
            'bill_date' => [
                'required',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
