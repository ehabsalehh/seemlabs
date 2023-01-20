<?php

namespace App\Http\Requests\Auth;

use App\Utilities\TelphoneVerified;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' =>['required',new TelphoneVerified()],
            'password' => 'required|min:6',
            'birth_date' =>"date_format:Y-M-D|before:today",

        ];
    }
}
