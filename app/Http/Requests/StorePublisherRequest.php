<?php

namespace App\Http\Requests;

use App\Models\Publisher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePublisherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('publisher_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:publishers',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'account_no' => [
                'string',
                'nullable',
            ],
            'ifsc' => [
                'string',
                'nullable',
            ],
            'bank_name' => [
                'string',
                'nullable',
            ],
            'gstin' => [
                'string',
                'min:15',
                'nullable',
            ],
            'contact_person' => [
                'string',
                'nullable',
            ],
            'contact_whatsapp' => [
                'string',
                'min:10',
                'nullable',
            ],
        ];
    }
}
