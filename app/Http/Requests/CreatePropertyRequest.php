<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePropertyRequest extends FormRequest {

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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'coordinates.latitude' => ['required', 'numeric'],
            'coordinates.longitude' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'price.perDay' => ['required', 'numeric', 'min:0'],
            'price.perWeek' => ['required', 'numeric', 'min:0'],
            'price.perMonth' => ['required', 'numeric', 'min:0'],
            'area_id' => ['required', 'exists:areas,id'],
            'address.street' => ['required', 'string'],
            'address.number' => ['required', 'string'],
            'address.zip' => ['required', 'string'],
            'address.door' => ['nullable', 'string'],
            'address.floor' => ['nullable', 'string'],
            'size' => ['required', 'string', 'min:1'],
            'number_of_baths' => ['required', 'integer', 'min:1'],
            'number_of_beds' => ['required', 'integer', 'min:1'],
            // specifications are ids array and  should exist in table
            'specifications' => [
                'required',
                'array',
                'exists:specifications,id',
            ],
            'hotspots' => [
                'required',
                'array',
                'exists:hotspots,id',
            ],
            //images are files and should be image type
            'images' => [
                'required',
                'array',
                'max:5',
                'mimes:jpeg,png,jpg',
            ],

        ];
    }

}
