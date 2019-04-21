<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'txtCateParent'  => 'required',
            'txtName'        => 'required|unique:products,name',
            'fImages'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtCateParent.required' => 'Please Choose Category',
            'txtName.required'   => 'Please Enter Name Product',
            'txtName.unique'   => 'Product Name Is Exist',
            'fImages.required' => 'Please Choose Images'
        ];
    }
}
