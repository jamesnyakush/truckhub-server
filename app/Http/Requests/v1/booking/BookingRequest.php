<?php

namespace App\Http\Requests\v1\booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start_date' => 'required',
            'end_date'   => 'required',
            'trucks_id' => 'required'
        ];
    }

}
