<?php

namespace App\Filament\Resources\Sponsors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class SponsorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('empresa')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->image()
                    ->disk('public_html')
                    ->directory('sponsors')
                    ->imagePreviewHeight('150')
                    ->required(),

                TextInput::make('web')
                    ->url()
                    ->maxLength(255)
                    ->nullable(),

                Toggle::make('activo')
                    ->default(true),
            ]);
    }
}
