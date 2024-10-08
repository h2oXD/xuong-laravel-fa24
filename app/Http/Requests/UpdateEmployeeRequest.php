<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UpdateEmployeeRequest extends FormRequest
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
        $id = $this->route('employee');
        return [
            'first_name'        => ['required','min:3','max:100'],
            'last_name'         => ['required','min:3','max:100'],
            'email'             => ['required','email','max:150', Rule::unique('employees')->ignore($id)],
            'phone'             => ['required','max:15'],
            'date_of_birth'     => ['required','date'],
            'hire_date'         => ['required','date'],
            'salary'            => ['required','decimal:0,99999999'],
            'is_active'         => ['nullable', Rule::in([0,1])],
            'department_id'     => ['required'],
            'manager_id'        => ['required'],
            'address'           => ['required'],
            'profile_picture'   => [File::image()->max('20mb'),'nullable']
        ];
    }
}
