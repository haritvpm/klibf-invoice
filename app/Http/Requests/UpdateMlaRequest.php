<?php

namespace App\Http\Requests;

use App\Models\Mla;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMlaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mla_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'name_mal' => [
                'string',
                'nullable',
            ],
        ];
    }
}
