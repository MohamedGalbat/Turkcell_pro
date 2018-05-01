<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
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

            "Title"=>"required|array",
            "Title.*"=>"required",
            "File"=>"required|array",
            "File.*"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "Title.*.required"=>":attribute can't be empty",
            "File.*.required"=>":attribute can't be empty"
        ];
    }
}
