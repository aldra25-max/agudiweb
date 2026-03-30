<?php

namespace App\Filament\Resources\Revistas;

use App\Filament\Resources\Revistas\Pages\CreateRevista;
use App\Filament\Resources\Revistas\Pages\EditRevista;
use App\Filament\Resources\Revistas\Pages\ListRevistas;
use App\Filament\Resources\Revistas\Schemas\RevistaForm;
use App\Filament\Resources\Revistas\Tables\RevistasTable;
use App\Models\Revista;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RevistaResource extends Resource
{
    protected static ?string $model = Revista::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Revista';

    public static function form(Schema $schema): Schema
    {
        return RevistaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RevistasTable::configure($table);
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
            'index' => ListRevistas::route('/'),
            'create' => CreateRevista::route('/create'),
            'edit' => EditRevista::route('/{record}/edit'),
        ];
    }
}
