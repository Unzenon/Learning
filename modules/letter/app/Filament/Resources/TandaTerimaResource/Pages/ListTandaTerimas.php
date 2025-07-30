<?php

namespace Venture\Letter\Filament\Resources\TandaTerimaResource\Pages;

use Venture\Letter\Filament\Resources\TandaTerimaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTandaTerimas extends ListRecords
{
    protected static string $resource = TandaTerimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
