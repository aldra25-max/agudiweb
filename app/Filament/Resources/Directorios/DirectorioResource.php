<?php

namespace App\Filament\Resources\Directorios;

use App\Filament\Resources\Directorios\Pages\CreateDirectorio;
use App\Filament\Resources\Directorios\Pages\EditDirectorio;
use App\Filament\Resources\Directorios\Pages\ListDirectorios;
use App\Filament\Resources\Directorios\Schemas\DirectorioForm;
use App\Filament\Resources\Directorios\Tables\DirectoriosTable;
use App\Models\Directorio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DirectorioResource extends Resource
{
    protected static ?string $model = Directorio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Directorio';

    public static function form(Schema $schema): Schema
    {
        return DirectorioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DirectoriosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDirectorios::route('/'),
            'create' => CreateDirectorio::route('/create'),
            'edit' => EditDirectorio::route('/{record}/edit'),
        ];
    }
}
