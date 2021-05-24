<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'                  =>  'required|max:255',
            'username'                 =>  'required|unique:users|max:255',
            'password'              =>  'required|confirmed|min:6|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'                 =>  'Name is required.',
            'name.max'                      =>  'Name can have max of 255 characters.',
            'username.required'                =>  'An username is required.',
            'username.unique'                  =>  'Username must be unique.',
            'username.max'                     =>  'Username can have max of 255 characters.',
            'password.required'             =>  'Password is required.',
            'password.max'                  =>  'Password can have max of 255 characters.',
        ];
    }
}
