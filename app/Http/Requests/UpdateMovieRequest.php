<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:20'],
            'genre_id' => ['required', 'exists:genres,id'],
            'format' => ['required', 'in:dvd,bluray,digital'],
        ];
    }
}
