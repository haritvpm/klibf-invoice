<?php

namespace App\Http\Requests;

use App\Models\SanctionedAmount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSanctionedAmountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sanctioned_amount_create');
    }

    public function rules()
    {
        return [
            'as_amount' => [
                'required',
            ],
            'fin_year_id' => [
                'required',
                'integer',
            ],
            'member_id' => [
                'required',
                'integer',
            ],
           
        ];
    }
}
