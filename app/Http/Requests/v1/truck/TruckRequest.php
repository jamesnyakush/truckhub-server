<?php

namespace App\Http\Requests\v1\truck;

use Illuminate\Foundation\Http\FormRequest;

class TruckRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
