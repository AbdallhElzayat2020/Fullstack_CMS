<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateNewsRequest extends FormRequest
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
        $newsId = request()->route('news');
        return [
            'language' => ['required'],
            'category_id' => ['required'],
            'title' => ['required', 'max:255', 'unique:news,title,' . $newsId],
            'description' => ['required'],
            'image' => ['sometimes', 'required', 'image', 'max:3000'],
            'meta_title' => ['nullable', 'max:255'],
            'meta_description' => ['nullable', 'max:255'],
            'tags' => ['required'],
            'is_breaking_news' => ['boolean'],
            'show_at_slider' => ['boolean'],
            'show_at_popular' => ['boolean'],
            'status' => ['in:active,inactive'],
        ];
    }
}
