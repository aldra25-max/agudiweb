<?php

namespace App\Filament\Resources\Boletins\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BoletinsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->searchable(),
                ImageColumn::make('imagen')
                    ->label('Imagen')
                    ->square(),
                TextColumn::make('link')
                    ->limit(40),
                IconColumn::make('publicar')
                    ->boolean()
                    ->label('Publicar'),
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make(),
                    ]);
    }
}
