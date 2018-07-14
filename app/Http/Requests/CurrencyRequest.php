<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            'title'      => 'required|unique:currency|min:2|max:255',
            'short_name' => 'required|unique:currency|min:2|max:10',
            'logo_url'   => 'required|unique:currency|url',
            'price'      => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'title'      => 'The title field is required.',
            'short_name' => 'The short name field is required.',
            'logo_url'   => 'The logo url field is required.',
            'price'      => 'The price field is required.',
        ];
    }
}
