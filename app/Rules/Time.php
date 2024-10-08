<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Time implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $value)) {
            $fail('Не верный формат времени! Оно должно быть в формате: HH:MM');
        }
    }
}
