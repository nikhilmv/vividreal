<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 */
class CompanyRequest extends FormRequest
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
        $request = [];
        if($this->method() == 'POST'){
            $request['name'] = 'required|max:255';
            $request['website'] = 'url';
            $request['email'] = 'unique:company,email|required|max:50|email|regex:/^[a-zA-Z]+(.*)@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
            $request['logo'] = 'nullable|image|dimensions:min_width=100,min_height=100|mimes:jpeg,jpg,png,gif';



        } else {
            $request['first_name'] = 'required|max:255';
            $request['website'] = 'url';
            $request['email'] = 'unique:company,email,'.$this->id.'|required|max:50|email|regex:/^[a-zA-Z]+(.*)@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
            $request['logo'] = 'required';

        }

        return $request;
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
