<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class TeacherRequest extends FormRequest
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
            'name'=>['required','min:4'],
            'email'=>['required','email'],
            'phone'=>['required','min:11'],
        ];
    }
    protected function failedValidation(Validator $validator )
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ],422));

    }
}
