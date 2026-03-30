<?php

namespace App\Filament\Resources\Noticias\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NoticiaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('autor')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('noticias')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                RichEditor::make('contenido')
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('publicar')
                    ->default(true),
            ]);
    }
}
