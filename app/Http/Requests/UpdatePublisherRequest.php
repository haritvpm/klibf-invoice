<?php

namespace App\Http\Requests;

use App\Models\Publisher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePublisherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('publisher_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:publishers,name,' . request()->route('publisher')->id,
            ],
        ];
    }
}