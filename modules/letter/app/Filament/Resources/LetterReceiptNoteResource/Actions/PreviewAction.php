<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptNoteResource\Actions;


use Filament\Tables\Actions\Action;
use Venture\Letter\Models\LetterReceiptNote;


class PreviewAction extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt/forms/actions-receipt-note';

    public static function getDefaultName(): ?string
    {
        return 'letter-receipt-note-preview';
    }

    protected function setUp(): void
    {
        $this->label("{$this->langPre}.preview.label");

        $this->translateLabel();

        $this->icon('heroicon-m-eye');

        $this->color('green');

        $this->url(function (LetterReceiptNote $note) {

            return route('@letter.letter.notes.preview_receipt_note', [
                'note' => $note,
            ]);
        });

        $this->openUrlInNewTab();
    }
}
