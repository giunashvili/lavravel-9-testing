<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'         => 'required|string',
            'logo'          => 'required|image',
            'address'       => 'required|string|min:3',
            'founded_at'    => 'required|date',
        ];
    }
}
