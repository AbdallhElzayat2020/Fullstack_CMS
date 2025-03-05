<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdminProfileUpdateRequest extends FormRequest
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
        $id = Auth::guard('admin')->user()->id;

        return [
            'image' => ['sometimes', 'required', 'image', 'max:3000'],
            'name' => ['required', 'max:200', 'min:3', ''],
            'email' => ['required', 'email', 'max:200', 'min:3', 'unique:admins,email,' . Auth::guard('admin')->user()->id]
        ];
    }
}
