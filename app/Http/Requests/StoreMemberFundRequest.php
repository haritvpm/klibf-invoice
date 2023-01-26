<?php

namespace App\Http\Requests;

use App\Models\MemberFund;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberFundRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_fund_create');
    }

    public function rules()
    {
        return [
            'bookfest_id' => [
                'required',
                'integer',
            ],
            'constituency_id' => [
                'required',
                'integer',
            ],
            'mla_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
