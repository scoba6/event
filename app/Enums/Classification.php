<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;


enum Classification: string implements HasLabel
{
    case A = 'STANDARD';
    case B = 'VIP';
    case C = 'VVIP';


    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'STANDARD',
            self::B => 'VIP',
            self::C => 'VVIP'
        };
    }
}
