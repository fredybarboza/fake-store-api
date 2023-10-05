<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class IndexProductRequest extends FormRequest
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
            'name' => 'string|nullable|max:255',
            'category_id' => 'nullable|numeric|integer|min:0',
            'price_min' => 'numeric',
            'price_max' => 'numeric',
            'per_page' => 'numeric|integer|min:1|max:20'
        ];
    }

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
