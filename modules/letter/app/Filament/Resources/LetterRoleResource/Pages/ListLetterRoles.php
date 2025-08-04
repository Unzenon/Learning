<?php

namespace Venture\Letter\Filament\Resources\LetterRoleResource\Pages;

use Venture\Letter\Filament\Resources\LetterRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterRoles extends ListRecords
{
    protected static string $resource = LetterRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
