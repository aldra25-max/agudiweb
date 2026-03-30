<?php

namespace App\Filament\Resources\Directorios\Pages;

use App\Filament\Resources\Directorios\DirectorioResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDirectorio extends EditRecord
{
    protected static string $resource = DirectorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
