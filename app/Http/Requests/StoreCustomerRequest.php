<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => ['required', 'max:255'],
            'address'       => ['required', 'max:255'],
            'avatar'        => ['nullable', 'image', 'max:255'],
            'phone'         => ['required', 'max:20', 'string', Rule::unique('customers')],
            'email'         => ['required', 'email', 'max:100'],
            'is_active'     => ['nullable', Rule::in([0,1])]
        ];
    }
}
