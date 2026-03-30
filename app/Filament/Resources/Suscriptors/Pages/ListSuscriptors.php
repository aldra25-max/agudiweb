<?php

namespace App\Filament\Resources\Suscriptors\Pages;

use App\Filament\Resources\Suscriptors\SuscriptorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuscriptors extends ListRecords
{
    protected static string $resource = SuscriptorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
