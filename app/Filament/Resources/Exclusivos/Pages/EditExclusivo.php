<?php

namespace App\Filament\Resources\Exclusivos\Pages;

use App\Filament\Resources\Exclusivos\ExclusivoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExclusivo extends EditRecord
{
    protected static string $resource = ExclusivoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
