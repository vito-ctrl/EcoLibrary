<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:250|unique:books,title,' . $this->route('book'),
            'author' => 'required|string|max:100',
            'description' => 'required|string',
            'published_year' => 'required|date',
            'category_id' => 'required'
        ];
    }

    public function message(): array {
        return [
            'title.required' => 'Book name is required.',
            'title.string' => 'Book hase to be string',
            'author.required' => 'author name is required.',
            'author.string' => 'author name hase to be string',
            'description.required' => 'description is required.',
            'published_year.required' => 'the publish year is required',
            'category_id.required' => 'category id is required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
