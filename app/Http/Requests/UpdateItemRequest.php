<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateItemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string',],
            'date' => ['required', 'date',],
            'quantity' => ['required', 'integer',],
            'unit' => ['required', 'string',],
            'category' => ['required'],
        ];
    }

    public function authorize()
    {
        return Gate::allows('item_access');
    }
}