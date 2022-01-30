<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' =>'required',
            'email' => 'required',
            'number' => 'required',
            'title' => 'required',
            'degree' => 'required',
            'experience' => 'required',
            'fess' => 'required',
            'time_slots' => 'required',
            'from_time' => 'required',
            'from_to' => 'required',
        ];
    }
}
