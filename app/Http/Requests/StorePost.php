<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'id' => 'required|unique:posts',
            'content' => 'required',
            'restaurant_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Please enter a valid post description',
            'restaurant_id.required' => 'Please enter a valid restaurant ID',
            'user_id.required' => 'Please enter a valid user ID'
        ];
    }
}
