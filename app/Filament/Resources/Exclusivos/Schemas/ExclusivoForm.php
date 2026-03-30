<?php

namespace App\Filament\Resources\Exclusivos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExclusivoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('contenido')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('exclusivos')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                FileUpload::make('docs')
                    ->label('Documento')
                    ->disk('public')
                    ->directory('exclusivos/docs')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ])
                    ->nullable(),

                Toggle::make('solo_socios')
                    ->default(true),

                Toggle::make('publicar')
                    ->default(true),
            ]);
    }
}
