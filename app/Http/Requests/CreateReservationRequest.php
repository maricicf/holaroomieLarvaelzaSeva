<?php

namespace App\Http\Requests;

use App\Models\Reservation;
use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest {

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
            'start_date' => [
                'required',
                'date',
                'before:end_date',
                function($attribute, $value, $fail) {
                    $this->validateDateOverlap($fail);
                },
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
                function($attribute, $value, $fail) {
                    $this->validateDateOverlap($fail);
                },
            ],
            'property_id' => 'required|exists:properties,id',
        ];
    }

    private function validateDateOverlap($fail) {
        $propertyId = $this->input('property_id');
        $startDate = $this->input('start_date');
        $endDate = $this->input('end_date');

        $overlapExists = Reservation::where('property_id', $propertyId)
            ->where(function($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->exists();

        if ($overlapExists) {
            $fail('The selected dates overlap with an existing reservation.');
        }
    }

}
