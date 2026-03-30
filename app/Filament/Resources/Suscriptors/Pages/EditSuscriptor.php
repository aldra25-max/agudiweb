<?php

namespace App\Filament\Resources\Suscriptors\Pages;

use App\Filament\Resources\Suscriptors\SuscriptorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSuscriptor extends EditRecord
{
    protected static string $resource = SuscriptorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
