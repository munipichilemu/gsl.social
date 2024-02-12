<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;
use Laragear\Rut\Rut;
use Filament\Forms\Set;

class RutInput extends TextInput
{
    public function rut(): static
    {
        $this
            ->live(onBlur: true)
            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('rut', Rut::parse($state)->format()))
            ->formatStateUsing(fn (?string $state): string => $state ?? '');

        return $this;
    }
}
