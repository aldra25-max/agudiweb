<?php

namespace App\Filament\Resources\Boletins\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BoletinForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),

                TextInput::make('link')
                    ->url()
                    ->maxLength(255)
                    ->nullable(),

                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('boletines')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                Toggle::make('publicar')
                    ->default(true),
            ]);
    }
}
