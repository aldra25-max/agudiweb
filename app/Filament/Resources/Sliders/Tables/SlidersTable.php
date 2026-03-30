<?php

namespace App\Filament\Resources\Sliders\Tables;

use Filament\Actions\RestoreBulkAction;
use Filament\Actions\DeleteBulkAction;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Actions\BulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class SlidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Imagen')
                    ->square(),

                TextColumn::make('titulo')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('orden')
                    ->sortable(),

                IconColumn::make('activo')
                    ->boolean()
                    ->label('Activo'),
            ])

            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make(),
                    ]);
    }
}
