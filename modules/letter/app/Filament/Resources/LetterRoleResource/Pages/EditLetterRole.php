<?php

namespace Venture\Letter\Filament\Resources\LetterRoleResource\Pages;

use Venture\Letter\Filament\Resources\LetterRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterRole extends EditRecord
{
    protected static string $resource = LetterRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
