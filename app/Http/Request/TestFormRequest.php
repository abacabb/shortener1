<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class TestFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}