<?php

namespace App\Filament\Resources\Boletins\Pages;

use App\Filament\Resources\Boletins\BoletinResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBoletins extends ListRecords
{
    protected static string $resource = BoletinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
