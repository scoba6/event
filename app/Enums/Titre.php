<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Titre: string implements HasLabel
{
    case A = 'M.';
    case B = 'Mme';
    case C = 'Couple';
    case D = 'Ste';

    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'M.',
            self::B => 'Mme',
            self::C => 'Couple',
            self::D => 'Ste',

        };
    }
}
