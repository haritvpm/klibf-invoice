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
        ];
    }
}