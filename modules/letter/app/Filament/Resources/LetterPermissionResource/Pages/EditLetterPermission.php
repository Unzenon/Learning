<?php

namespace Venture\Letter\Filament\Resources\LetterPermissionResource\Pages;

use Venture\Letter\Filament\Resources\LetterPermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterPermission extends EditRecord
{
    protected static string $resource = LetterPermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
