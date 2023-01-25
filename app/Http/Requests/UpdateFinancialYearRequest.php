<?php

namespace App\Http\Requests;

use App\Models\FinancialYear;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFinancialYearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('financial_year_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:financial_years,title,' . request()->route('financial_year')->id,
            ],
        ];
    }
}
