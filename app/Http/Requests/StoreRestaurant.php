<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurant extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'suburb' => 'required',
            'state' => 'required',
            'numberofseats' => 'required',
            'country_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a valid name',
            'phone.required' => 'Please enter a valid phone number',
            'address1.required' => 'Please enter a valid address',
            'suburb.required' => 'Please enter a valid suburb',
            'state.required' => 'Please enter a valid state',
            'numberofseats.required' => 'Please enter a valid number of seats',
            'country_id.required' => 'Please enter a valid country',
            'category_id.required' => 'Please enter a valid category',
        ];
    }
}
