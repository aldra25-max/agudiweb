<?php

namespace App\Filament\Resources\Galerias\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GaleriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('imagen')
                    ->image()
                    ->disk('public')
                    ->directory('galeria')
                    ->imagePreviewHeight('150')
                    ->required(),

                Textarea::make('descripcion')
                    ->rows(3)
                    ->nullable(),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0),

                Toggle::make('activo')
                    ->default(true),
            ]);
    }
}
