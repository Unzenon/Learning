<?php

namespace Venture\Letter\Filament\Resources\LetterUserResource\Pages;

use Venture\Letter\Filament\Resources\LetterUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterUser extends EditRecord
{
    protected static string $resource = LetterUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
