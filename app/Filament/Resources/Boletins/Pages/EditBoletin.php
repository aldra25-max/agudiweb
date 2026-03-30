<?php

namespace App\Filament\Resources\Boletins\Pages;

use App\Filament\Resources\Boletins\BoletinResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBoletin extends EditRecord
{
    protected static string $resource = BoletinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
