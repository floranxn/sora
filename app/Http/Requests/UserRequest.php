<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        // CREATE ROLES
                        'uname' => 'required|max:20|unique:users',
                        'email' => 'required|email|unique:users',
                        'password' => 'required|between:4,60',
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    $id = $this->route('user');
                    return [
                        // UPDATE ROLES
                        'uname' => 'filled|max:20|unique:users,uname,' . $id,
                        'email' => 'filled|email|unique:users,email,' . $id,
                        'mobile' => 'filled|digits:11|unique:users,mobile,' . $id,
                        'status' => 'filled|integer',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [
                        //
                    ];
                }
        }
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
