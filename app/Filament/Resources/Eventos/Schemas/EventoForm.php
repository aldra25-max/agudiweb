<?php

namespace App\Filament\Resources\Eventos\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                DateTimePicker::make('fecha_hora')
                    ->required(),

                TextInput::make('lugar')
                    ->maxLength(255)
                    ->nullable(),

                TextInput::make('link')
                    ->url()
                    ->maxLength(255)
                    ->nullable(),

                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('eventos')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                Toggle::make('publicar')
                    ->default(true),

                Textarea::make('descripcion')
                    ->rows(4)
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
