<?php

namespace App\Http\Requests;

class AuthenticateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required_without:mobile|email|exists:users',
            'mobile' => 'required_without:email|digits:11|exists:users',
            'password' => 'required|between:4,60',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
