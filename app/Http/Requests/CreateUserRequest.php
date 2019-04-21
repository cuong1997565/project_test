<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'      =>      'required|min:3',
            'email'     =>      'required|email',
            'password'  =>      'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'name không để trống',
            'name.min'          => 'name ít nhất có 3 ký tự',
            'email.required'    => 'email không được để trống',
            'email.email'       => 'email không đúng định dạng',
            'password.required' => 'password không được để trống'
        ];
    }
}
