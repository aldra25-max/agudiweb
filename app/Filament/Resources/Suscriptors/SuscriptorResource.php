<?php

namespace App\Filament\Resources\Suscriptors;

use App\Filament\Resources\Suscriptors\Pages\CreateSuscriptor;
use App\Filament\Resources\Suscriptors\Pages\EditSuscriptor;
use App\Filament\Resources\Suscriptors\Pages\ListSuscriptors;
use App\Filament\Resources\Suscriptors\Schemas\SuscriptorForm;
use App\Filament\Resources\Suscriptors\Tables\SuscriptorsTable;
use App\Models\Suscriptor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuscriptorResource extends Resource
{
    protected static ?string $model = Suscriptor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Suscriptor';

    public static function form(Schema $schema): Schema
    {
        return SuscriptorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuscriptorsTable::configure($table);
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
            'index' => ListSuscriptors::route('/'),
            'create' => CreateSuscriptor::route('/create'),
            'edit' => EditSuscriptor::route('/{record}/edit'),
        ];
    }
}
