<?php

namespace App\Filament\Resources\Exclusivos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExclusivosTable
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
                    ->limit(50),

                IconColumn::make('solo_socios')
                    ->boolean()
                    ->label('Solo Socios'),

                IconColumn::make('publicar')
                    ->boolean()
                    ->label('Publicar'),

                TextColumn::make('created_at')
                    ->label('Creado')
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
