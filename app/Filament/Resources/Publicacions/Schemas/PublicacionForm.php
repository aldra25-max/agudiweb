<?php

namespace App\Filament\Resources\Publicacions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PublicacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('publicaciones')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                Toggle::make('publicar')
                    ->default(true),

                RichEditor::make('contenido')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
