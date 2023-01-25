<?php

namespace App\Http\Requests;

use App\Models\BookFest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookFestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_fest_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:book_fests,title,' . request()->route('book_fest')->id,
            ],
            'from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'to' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
