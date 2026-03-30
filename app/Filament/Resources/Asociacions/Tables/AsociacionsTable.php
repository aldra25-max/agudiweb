<?php

namespace App\Filament\Resources\Asociacions\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AsociacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                    TextColumn::make('razon_social')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('ruc')
                    ->searchable(),
                    TextColumn::make('direccion')
                    ->searchable(),
                    TextColumn::make('telefono')
                    ->searchable(),
                    TextColumn::make('correo')
                    ->searchable(),
                    TextColumn::make('representante_legal')
                    ->searchable(),
                    TextColumn::make('celular_representante')
                    ->searchable(),
                    TextColumn::make('email_representante')
                    ->searchable(),
                    TextColumn::make('contactos.*.nombre')
                    ->label('Nombre de Contacto')
                    ->searchable(),
                    TextColumn::make('contactos.*.telefono')
                    ->label('Teléfono de Contacto')
                    ->searchable(),
                    TextColumn::make('contactos.*.correo')
                    ->label('Correo de Contacto')
                    ->searchable(),
                    TextColumn::make('servicios')
                    ->searchable(),
                    TextColumn::make('maquinarias')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('razon_social', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make(),
                    ]);
    }
}
