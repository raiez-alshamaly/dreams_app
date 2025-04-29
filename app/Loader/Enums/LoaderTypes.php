<?php 

namespace App\Loader\Enums;

enum LoaderTypes: string
{
    case EMPTY = 'empty';
    case IMAGE = 'image';
    case VIDEO = 'video';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}




