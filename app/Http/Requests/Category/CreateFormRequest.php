<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'categoryname' => 'required',
            'description' => 'required'
        ];

    }

    public function messages()
    {
        return [ 
            'categoryname.required' => 'The category name field is required.'
        ];
    }
}
