<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeSpecificationCategoryRequest extends FormRequest {

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
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'is_single_answer' => 'boolean|nullable',
        ];
    }

}
