<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user')->id;
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $userId,
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable',
            'phone' => 'required|numeric',
            'status' => 'required',
            'contract' => 'string|nullable',
        ];
    }
}
