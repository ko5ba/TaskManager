<?php

namespace App\Http\Requests\Task;

use App\Rules\Time;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'nullable|string',
            'date_deadline' => 'nullable|date',
            'time_deadline' => ['nullable', new Time]
        ];
    }

    public function message(): array
    {
        return [
            'title.required' => 'Вы не ввели название задачи',
            'title.max:255' => 'Вы ввели огромное количество символов',
        ];
    }
}
