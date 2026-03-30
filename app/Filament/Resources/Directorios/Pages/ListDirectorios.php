<?php

namespace App\Filament\Resources\Directorios\Pages;

use App\Filament\Resources\Directorios\DirectorioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDirectorios extends ListRecords
{
    protected static string $resource = DirectorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
