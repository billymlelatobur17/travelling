<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelPackageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'about' => 'required',
            'featured_event' => 'required|max:255',
            'language' => 'required|string|max:255',
            'food' => 'required|string|max:255',
            'departure_date' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'price' => 'required|integer',
            'type' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
