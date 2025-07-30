<?php

namespace Venture\Letter\Enums;

enum MigrationsEnum
{
    case TANDA_TERIMAS;

    public function table(): string
    {
        return match ($this) {
            self::TANDA_TERIMAS => 'letter_tandaterimas',
        };
    }
}
