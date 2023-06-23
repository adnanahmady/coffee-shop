<?php

namespace App\Enums;

enum AbilityEnum: string
{
    case AddProduct = 'Add product';

    public function slugify(): string
    {
        return str($this->value)->snake();
    }

    public function translate(string $locale = null): string
    {
        return __($this->value, locale: $locale);
    }
}