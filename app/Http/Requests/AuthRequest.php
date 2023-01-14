<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'string|email',
            'phone'=>'required|numeric|unique:users,phone', //regex:01[0125][0-9]{8}|'
            'password'=>'required|string|confirmed'
        ];
    }
}
