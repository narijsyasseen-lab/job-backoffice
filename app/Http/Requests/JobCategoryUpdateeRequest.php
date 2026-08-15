<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JobCategoryUpdateeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name'=>'required|string|max:225|unique:job_categories,name,' .$this->route('job_category'),
              
        ];
    }
     public function messages(){
        return[
            'name.required' => 'The category name field is required.',
            'name.unique' => 'The category name has already been taken.',
            'name.max' => 'The category name must be less than 225 characters.',
            'name.string' => 'The category name must be a string.',
          ];

    }
}
