<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

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
            'imageUrls.*' => 'imageUrls[:index]'
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
            'description' => 'string'
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
