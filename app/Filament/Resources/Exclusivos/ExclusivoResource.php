<?php

namespace App\Filament\Resources\Exclusivos;

use App\Filament\Resources\Exclusivos\Pages\CreateExclusivo;
use App\Filament\Resources\Exclusivos\Pages\EditExclusivo;
use App\Filament\Resources\Exclusivos\Pages\ListExclusivos;
use App\Filament\Resources\Exclusivos\Schemas\ExclusivoForm;
use App\Filament\Resources\Exclusivos\Tables\ExclusivosTable;
use App\Models\Exclusivo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExclusivoResource extends Resource
{
    protected static ?string $model = Exclusivo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Exclusivo';

    public static function form(Schema $schema): Schema
    {
        return ExclusivoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExclusivosTable::configure($table);
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
            'index' => ListExclusivos::route('/'),
            'create' => CreateExclusivo::route('/create'),
            'edit' => EditExclusivo::route('/{record}/edit'),
        ];
    }
}
