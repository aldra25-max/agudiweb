<?php

namespace App\Filament\Resources\Exclusivos\Pages;

use App\Filament\Resources\Exclusivos\ExclusivoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExclusivos extends ListRecords
{
    protected static string $resource = ExclusivoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
