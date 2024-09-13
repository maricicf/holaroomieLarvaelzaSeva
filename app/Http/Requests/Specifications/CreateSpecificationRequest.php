<?php

namespace App\Http\Requests\Specifications;

use Illuminate\Foundation\Http\FormRequest;

class CreateSpecificationRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => 'required|string',
            'icon' => 'nullable|string',
            'category_id' => 'required|exists:specification_categories,id',
        ];
    }

}
