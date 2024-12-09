<?php

namespace App\Http\Requests\Coupons;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:100', 'unique:coupons,code,' . $this->id],
            'discount' => ['required', 'numeric', 'min:0', 'max:99999.99'],
            'expired_at' => ['nullable', 'date', 'after:today'],
            'is_for_all_users' => ['required', 'boolean'],
            'notify_all_users' => ['required', 'boolean'],
            'number_of_use' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],

            // Validation for associated users and companies
            'users' => ['nullable', 'array'],
            'users.*' => ['integer', 'exists:users,id'],
            'companies' => ['nullable', 'array'],
            'companies.*' => ['integer', 'exists:companies,id'],
        ];

    }
}
