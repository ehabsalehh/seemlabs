<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReduceToZeroRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Q' => ['required','array','min:1'],
            'Q.*' => 'required',
        ];
    }
}
