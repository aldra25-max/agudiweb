<?php

namespace App\Filament\Resources\Boletins;

use App\Filament\Resources\Boletins\Pages\CreateBoletin;
use App\Filament\Resources\Boletins\Pages\EditBoletin;
use App\Filament\Resources\Boletins\Pages\ListBoletins;
use App\Filament\Resources\Boletins\Schemas\BoletinForm;
use App\Filament\Resources\Boletins\Tables\BoletinsTable;
use App\Models\Boletin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BoletinResource extends Resource
{
    protected static ?string $model = Boletin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Boletin';

    public static function form(Schema $schema): Schema
    {
        return BoletinForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BoletinsTable::configure($table);
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
            'index' => ListBoletins::route('/'),
            'create' => CreateBoletin::route('/create'),
            'edit' => EditBoletin::route('/{record}/edit'),
        ];
    }
}
