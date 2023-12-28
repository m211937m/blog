<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

            'title'=>['required','max:50','min:20','string'],
            'img_main'=>['required','image','mimes:png,jpg','max:2024'],
            'Image_secondary_1'=>['required','image','mimes:png,jpg','max:2024'],
            'Image_secondary_2'=>['required','image','mimes:png,jpg','max:2024'],
            'paragraph_1'=>['required','min:20','string'],
            'paragraph_2'=>['required','min:20','string'],
            'paragraph_3'=>['required','min:20','string'],
        ];
    }
}
