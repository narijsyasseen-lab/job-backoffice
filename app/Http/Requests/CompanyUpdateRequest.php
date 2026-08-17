<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
             'name '=> 'required|string|max:225|unique:companies,name' ,
              'address' => 'required|string|max:255',
              'industry' => 'required|string|max:255',
              'website' => 'nullable|string|url|max:255',
              
        ];
    }
     public function messages(): array
{
    return [
        'name.required' => 'The company name is required.',
        'name.unique' => 'The company name has already been taken.',
        'name.max' => 'The company name must be less than 255 characters.',
        'name.string' => 'The company name must be a string.',
        
        'address.required' => 'The company address is required.',
        'address.max' => 'The company address must be less than 255 characters.',
        'address.string' => 'The company address must be a string.',
        
        'industry.required' => 'The company industry is required.',
        'industry.max' => 'The company industry must be less than 255 characters.',
        'industry.string' => 'The company industry must be a string.',
        
        'website.url' => 'The company website must be a valid URL.',
        'website.max' => 'The company website must be less than 255 characters.',
        'website.string' => 'The company website must be a string.',
    ];
  }
}
