<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from_location' => 'required|string|max:255',
            'to_location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'type_of_transport' => 'required|string|max:255',
            'type_of_cargo' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'price' => 'required|numeric',
        ];
    }
}
