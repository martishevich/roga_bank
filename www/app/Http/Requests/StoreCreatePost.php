<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreatePost extends FormRequest
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
            'login' => 'required',
            'password' => 'required|min:8',
            'lastName' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'numberPassport' => ['required', 'regex:/^[А-Я]{2}[0-9]{7}/u'],
            'identificationNumber' => 'required|size:14',
            'phone' => 'required|digits_between:9,12',
            'mail' => 'required|email',
            'birthday' => 'required|date|after:01/01/1900|before:today'
        ];
    }
}
