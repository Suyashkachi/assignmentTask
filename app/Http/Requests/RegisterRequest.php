<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|alpha',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required|numeric',
            'street' => 'required',
            'city' => 'required|regex:/^[a-zA-Z\s]*$/',
            'state' => 'required|alpha',
            'zip' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'name.alpha' => 'Name accepts only alphabets',
            'email.required' => 'Please enter email',
            'email.unique' => 'Email already exists',
            'password.required' => 'Please enter password',
            'password.min' => 'Password should not be less that 8 characters',
            'phone.required' => 'Please enter phone',
            'phone.numeric' => 'Phone accepts only numbers',
            'street.required' => 'Please enter street',
            'city.required' => 'Please enter city',
            'city.regex' => 'City accepts only alphabets',
            'state.required' => 'Please enter state',
            'state.alpha' => 'State accepts only alphabets',
            'zip.required' => 'Please enter zip',
            'zip.numeric' => 'Zip accepts only numbers',
        ];
    }
}
