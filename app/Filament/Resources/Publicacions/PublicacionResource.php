<?php

namespace App\Filament\Resources\Publicacions;

use App\Filament\Resources\Publicacions\Pages\CreatePublicacion;
use App\Filament\Resources\Publicacions\Pages\EditPublicacion;
use App\Filament\Resources\Publicacions\Pages\ListPublicacions;
use App\Filament\Resources\Publicacions\Schemas\PublicacionForm;
use App\Filament\Resources\Publicacions\Tables\PublicacionsTable;
use App\Models\Publicacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PublicacionResource extends Resource
{
    protected static ?string $model = Publicacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Publicacion';

    public static function form(Schema $schema): Schema
    {
        return PublicacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublicacionsTable::configure($table);
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
            'index' => ListPublicacions::route('/'),
            'create' => CreatePublicacion::route('/create'),
            'edit' => EditPublicacion::route('/{record}/edit'),
        ];
    }
}
