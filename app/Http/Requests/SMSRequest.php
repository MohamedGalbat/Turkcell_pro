<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SMSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "description"=>"required",
            "English_content"=>"required",
            "Turkish_content"=>"required",
        ];
    }
    public function messages()
    {
        return[
            "Turkish_content.required"=>"Turkish content is required",
            "English_content.required"=>"English content is required",
        ];

    }
}
