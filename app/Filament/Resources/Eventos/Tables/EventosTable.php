<?php

namespace App\Filament\Resources\Eventos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventosTable
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
                    ->limit(45),

                TextColumn::make('fecha_hora')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('lugar'),

                IconColumn::make('publicar')
                    ->boolean()
                    ->label('Publicar'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('fecha_hora', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make(),
                    ]);
    }
}
