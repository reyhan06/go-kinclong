<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancelRequest extends FormRequest
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
        return [
            'cancel_note' => ['required', 'max:255'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cancel_note.required' => 'Alasan wajib diisi',
            'cancel_note.max' => 'Panjang Alasan maksimal 255 karakter',
        ];
    }
}
