<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", "max:100"],
            "rating" => ["required", "integer"],
        ];
    }
}

            // "name" => ["required", "string", "max:100", "regex:/^[a-zA-Z]+$/"],
