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
            'login' => 'required|unique:users',
            'password' => 'required|min:8',
            'lastName' => 'required|alpha|min:2',
            'firstName' => 'required|alpha|min:2',
            'middleName' => 'required|alpha|min:2',
            'numberPassport' => ['required', 'regex:/^[А-Я]{2}[0-9]{7}/u'],
            'identificationNumber' => 'required|size:14',
            'phone' => 'required|min:9|max:13',
            'mail' => 'required|email',
            'birthday' => 'required|date|after:1910/01/01|before:'.date("Y-m-d", strtotime("-18 year", microtime(true)))
        ];
    }
}
