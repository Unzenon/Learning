<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptNoteResource\Pages;

use Venture\Letter\Filament\Resources\LetterReceiptNoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterReceiptNotes extends ListRecords
{
    protected static string $resource = LetterReceiptNoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
