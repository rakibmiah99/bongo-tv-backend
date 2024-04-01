<?php

namespace App\Enums;

enum MoviePlayMode: string
{
    case FREE = 'free';
    case PAID = 'paid';

    public static function toArray(): array{
        $cases = collect(MoviePlayMode::cases());
        return $cases->map(function ($case){
            return $case->value;
        })->toArray();
    }
}
