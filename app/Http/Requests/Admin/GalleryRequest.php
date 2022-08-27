<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'travel_packages_id' => 'required|integer|exists:travel_packages,id',
            'image' => 'required|image',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
