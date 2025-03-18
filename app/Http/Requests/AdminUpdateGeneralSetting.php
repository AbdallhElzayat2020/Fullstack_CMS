<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateGeneralSetting extends FormRequest
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
            'site_name' => ['required', 'sometimes', 'max:255'],
            'site_logo' => ['required', 'sometimes', 'image', 'max:3000'],
            'site_favicon' => ['required', 'sometimes', 'image', 'max:1500'],
        ];
    }
}
