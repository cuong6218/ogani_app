<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoodRequest extends FormRequest
{
    /**
     * Determine if the home is authorized to make this request.
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
            'name' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please type category name.',
        ]; // TODO: Change the autogenerated stub
    }
}
