<?php

namespace App\Filament\Resources\Suscriptors\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SuscriptorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                DatePicker::make('fecha_suscripcion')
                    ->required()
                    ->default(now()),

                Toggle::make('activo')
                    ->default(true),
            ]);
    }
}
