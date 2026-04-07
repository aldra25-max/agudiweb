<?php

namespace App\Filament\Resources\Asociacions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class AsociacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('razon_social')
                ->label('Razón Social')
                ->required()
                ->maxLength(255),
            TextInput::make('ruc')
                ->label('RUC')
                ->required()
                ->numeric()
                ->length(11)
                ->unique(ignoreRecord: true),
            TextInput::make('direccion')
                ->label('Dirección')
                ->nullable(),
        TextInput::make('telefono')
                ->label('Telefono')
                ->tel()
                ->nullable(),
            TextInput::make('correo')
                ->label('Email')
                ->email()
                ->nullable(),
            TextInput::make('representante_legal')
                ->label('Representante Legal')
                ->nullable(),
            TextInput::make('celular_representante')
                ->label('Celular Representante')
                ->tel()
                ->nullable(),
            TextInput::make('email_representante')
                ->label('Correo Representante')
                ->email()
                ->nullable(),
            Repeater::make('contactos')
    ->label('Contactos')
    ->schema([
        TextInput::make('nombre')
            ->label('Nombre')
            ->required(),
        TextInput::make('telefono')
            ->label('Teléfono')
            ->tel(),
        TextInput::make('correo')
            ->label('Correo')
            ->email(),
    ])
    ->columns(3)
    ->defaultItems(1)
    ->addActionLabel('Agregar contacto'),
            Textarea::make('servicios')
                ->label('Servicios / Productos')
                ->rows(5)
                ->nullable()
                ->columnSpanFull(),
            Textarea::make('maquinarias')
                ->label('Maquinarias')
                ->rows(2)
                ->nullable()
                ->columnSpanFull(),


        ]);
    }
}
