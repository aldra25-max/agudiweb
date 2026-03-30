<?php

namespace App\Filament\Resources\Asociacions\Pages;

use App\Filament\Resources\Asociacions\AsociacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAsociacion extends EditRecord
{
    protected static string $resource = AsociacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
