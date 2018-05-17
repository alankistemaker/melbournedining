<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'country_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'please enter a valid username',
            'email.required' => 'please enter a valid email address',
            'password.required' => 'please enter a valid password',
            'country_id.required' => 'please enter a valid country ID',
        ];
    }
}