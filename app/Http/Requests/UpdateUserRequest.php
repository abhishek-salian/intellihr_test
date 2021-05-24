<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username'                 =>  'required|max:255|unique:users,username,' . $this->user->id
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
            'username.max'                     =>  'Username can have max of 255 characters.'
        ];
    }
}
