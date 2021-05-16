<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'service_id' => ['required', 'integer', 'exists:services,id'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', Rule::in(Book::getTimes())],
        ];

        if (isset($this->id)) {
            $allowed_routes = [
                $this->routeIs('books.update', $this->id),
                $this->routeIs('books.confirm', $this->id),
                $this->routeIs('books.end', $this->id)
            ];
            $allowed = in_array(true, $allowed_routes);
            if ($allowed) {
                $rules['end_time'] = [ 'required', Rule::in(Book::getTimes()) ];
            }
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_name.required' => 'Nama wajib diisi',
            'customer_name.alpha_spaces' => 'Nama hanya boleh berupa huruf dan spasi',
            'customer_name.max' => 'Panjang Nama maksimal 64 karakter',

            'customer_phone.required' => 'Kontak wajib diisi',
            'customer_phone.string' => 'Kontak tidak dapat divalidasi',
            'customer_phone.max' => 'Panjang Kontak maksimal 24 karakter',

            'vehicle_type.required' => 'Jenis Kendaraan wajib diisi',
            'vehicle_type.alpha_spaces' => 'Jenis Kendaraan hanya boleh berupa huruf dan spasi',
            'vehicle_type.max' => 'Panjang Jenis Kendaraan maksimal 24 karakter',

            'vehicle_license_plate.required' => 'Plat Nomor Kendaraan wajib diisi',
            'vehicle_license_plate.string' => 'Plat Nomor Kendaraan tidak dapat divalidasi',
            'vehicle_license_plate.max' => 'Panjang Plat Nomor Kendaraan maksimal 16 karakter',

            'service_id.required' => 'Layanan wajib diisi',
            'service_id.integer' => 'Layanan tidak dapat divalidasi',
            'service_id.exists' => 'Layanan tidak dapat divalidasi',

            'date.required' => 'Jadwal Tanggal wajib diisi',
            'date.date' => 'Jadwal Tanggal tidak dapat divalidasi',
            'date.after_or_equal' => 'Jadwal Tanggal setidaknya tanggal sekarang atau tanggal ke depannya',

            'time.required' => 'Jadwal Jam wajib diisi',
            'time.in' => 'Jadwal Jam tidak dapat divalidasi',
        ];
    }
}
