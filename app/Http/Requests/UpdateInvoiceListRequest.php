<?php

namespace App\Http\Requests;

use App\Models\InvoiceList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_list_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'institution_type' => [
                'required',
            ],
            'institution_name' => [
                'string',
                'required',
            ],
            'member_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
