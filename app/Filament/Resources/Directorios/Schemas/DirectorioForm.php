<?php

namespace App\Filament\Resources\Directorios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DirectorioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('orden')
                    ->numeric()
                    ->default(0),
                TextInput::make('empresa')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('cargo')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('foto')
                    ->image()
                    ->disk('public_html')
                    ->directory('directorio')
                    ->imagePreviewHeight('150')
                    ->nullable(),
                Toggle::make('activo')
                    ->default(true),
            ]);
    }
}
