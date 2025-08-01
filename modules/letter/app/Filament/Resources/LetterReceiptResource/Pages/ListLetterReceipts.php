<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptResource\Pages;

use Venture\Letter\Filament\Resources\LetterReceiptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterReceipts extends ListRecords
{
    protected static string $resource = LetterReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
