<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('sliders')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                TextInput::make('link')
                    ->maxLength(255)
                    ->nullable(),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0),

                Toggle::make('activo')
                    ->default(true),
            ]);
    }
}
