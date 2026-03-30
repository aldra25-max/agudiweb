<?php

namespace App\Filament\Resources\Asociacions;

use App\Filament\Resources\Asociacions\Pages\CreateAsociacion;
use App\Filament\Resources\Asociacions\Pages\EditAsociacion;
use App\Filament\Resources\Asociacions\Pages\ListAsociacions;
use App\Filament\Resources\Asociacions\Schemas\AsociacionForm;
use App\Filament\Resources\Asociacions\Tables\AsociacionsTable;
use App\Models\Asociacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AsociacionResource extends Resource
{
    protected static ?string $model = Asociacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Asociacion';

    public static function form(Schema $schema): Schema
    {
        return AsociacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AsociacionsTable::configure($table);
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
            'index' => ListAsociacions::route('/'),
            'create' => CreateAsociacion::route('/create'),
            'edit' => EditAsociacion::route('/{record}/edit'),
        ];
    }
}
