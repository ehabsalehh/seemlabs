<?php

namespace App\Http\Requests;

use App\Utilities\TelphoneVerified;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('Users')->ignore($this->user)],
            'email' => ['required', 'email', Rule::unique('Users')->ignore($this->user)],
            'password' => 'required|min:6',
            'phone_number' => ['required',new TelphoneVerified()],
            'birth_date' =>"date_format:Y-m-d|before:today",
        ];

    }
}
