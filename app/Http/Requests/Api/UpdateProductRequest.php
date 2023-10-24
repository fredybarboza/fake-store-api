<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'imageUrls' => 'array|max:4',
            'imageUrls.*' => 'required|url',
            'category_id' => 'exists:categories,id',
            'price' => 'numeric',
            'description' => 'string'
        ];
    }

    /**
     * Handle a failed validation attempt and throw a validation exception with errors.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

       throw new HttpResponseException(
        response()->json([
            'errors' => $errors,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );

    }
}
