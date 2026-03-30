<?php

namespace App\Filament\Resources\Asociacions\Pages;

use App\Filament\Resources\Asociacions\AsociacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAsociacions extends ListRecords
{
    protected static string $resource = AsociacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
