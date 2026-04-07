<?php

namespace App\Filament\Resources\Revistas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RevistaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('edicion')
                    ->label('Edicion N')
                    ->numeric()
                    ->required(),
                DatePicker::make('fecha_edicion')
                    ->required(),
                FileUpload::make('imagen')
                    ->label('Imagen de Portada')
                    ->image()
                    ->disk('public_html')
                    ->directory('revistas')
                    ->imagePreviewHeight('150')
                    ->nullable(),
                FileUpload::make('archivo_pdf')
                    ->label('Archivo PDF')
                    ->disk('public_html')
                    ->directory('revistas/pdf')
                    ->acceptedFileTypes(['application/pdf'])
                    ->nullable(),
                Toggle::make('publicar')
                    ->default(true),
            ]);
    }
}
