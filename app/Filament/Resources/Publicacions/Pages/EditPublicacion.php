<?php

namespace App\Filament\Resources\Publicacions\Pages;

use App\Filament\Resources\Publicacions\PublicacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPublicacion extends EditRecord
{
    protected static string $resource = PublicacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
