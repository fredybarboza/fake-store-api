<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'imageFiles.*' => 'imageFiles[:index]',
            'imageUrls.*' => 'imageUrls[:index]',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'imageFiles' => 'array|max:4',
            'imageFiles.*' => 'image|mimes:jpeg,png,jpg',
            'imageUrls' => 'array|max:4',
            'imageUrls.*' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'string',
        ];
    }

    /**
     * Handle a failed validation attempt and throw a validation exception with errors.
     *
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
