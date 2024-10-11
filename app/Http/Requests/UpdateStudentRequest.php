<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
        $studentId = $this->route('student')->id;
        return [
            'name' => 'required|string|max:255',
            'email' => [Rule::unique('students')->ignore($studentId), 'required', 'email'],
            'classroom_id' => 'required|exists:classrooms,id',
            'passport_number' => 'required|string|max:50',
            'issued_date' => 'required|date',
            'expiry_date' => 'required|date|after:issued_date',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sinh viên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.unique' => 'Email đã tồn tại.',
            'classroom_id.required' => 'Lớp học là bắt buộc.',
            'classroom_id.exists' => 'Lớp học không hợp lệ.',
            'passport_number.required' => 'Số hộ chiếu là bắt buộc.',
            'issued_date.required' => 'Ngày cấp hộ chiếu là bắt buộc.',
            'expiry_date.required' => 'Ngày hết hạn hộ chiếu là bắt buộc.',
            'expiry_date.after' => 'Ngày hết hạn phải sau ngày cấp.',
            'subjects.required' => 'Phải chọn ít nhất một môn học.',
            'subjects.*.exists' => 'Môn học không hợp lệ.',
        ];
    }
}
