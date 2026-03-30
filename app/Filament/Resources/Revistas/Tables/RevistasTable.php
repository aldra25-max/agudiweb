<?php

namespace App\Filament\Resources\Revistas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RevistasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Portada')
                    ->square(),

                TextColumn::make('edicion')
                    ->label('Edición N°')
                    ->sortable(),

                TextColumn::make('fecha_edicion')
                    ->date()
                    ->sortable(),

                IconColumn::make('publicar')
                    ->boolean()
                    ->label('Publicar'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('edicion', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make(),
                    ]);
    }
}
