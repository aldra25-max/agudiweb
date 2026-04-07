<?php

namespace App\Filament\Resources\Socios\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SocioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('empresa')
            ->required()
            ->maxLength(255),
            FileUpload::make('logo')
            ->image()
            ->disk('public_html')
            ->directory('socios')
            ->imagePreviewHeight('150')
            ->required(),
            TextInput::make('telefono')
            ->nullable(),
            TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
            TextInput::make('direccion')
            ->nullable(),
            TextInput::make('link')
            ->label('Página web')
            ->url()
            ->nullable(),
            TextInput::make('facebook')
            ->url()
            ->nullable(),
            TextInput::make('instagram')
            ->url()
            ->nullable(),
            TextInput::make('linkedin')
            ->url()
            ->nullable(),
            Textarea::make('descripcion')
            ->rows(4)
            ->columnSpanFull(),
            DatePicker::make('fecha_ingreso')->required(),
            Toggle::make('activo')->default(true),
]);
    }
}
