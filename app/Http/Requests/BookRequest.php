<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'customer_name' => ['required', 'alpha_spaces', 'max:64'],
            'customer_phone' => ['required', 'string', 'max:24'],
            'vehicle_type' => ['required', 'alpha_spaces', 'max:24'],
            'vehicle_license_plate' => ['required', 'string', 'max:16'],
            'service_id' => ['required', 'integer'],
            'schedule_start_at' => ['required', 'date', 'after_or_equal:now'],
        ];

        return $rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'date' => date('Y-m-d H:i:s', strtotime($this->date)),
        ]);
    }
}
