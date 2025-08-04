<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptResource\Actions;


use Filament\Tables\Actions\Action;
use Venture\Letter\Models\LetterReceipt;


class PreviewAction extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt/forms/actions-receipt';

    public static function getDefaultName(): ?string
    {
        return 'letter-receipt-preview';
    }

    protected function setUp(): void
    {
        $this->label("{$this->langPre}.preview.label");

        $this->translateLabel();

        $this->icon('heroicon-m-eye');

        $this->color('green');

        $this->url(function (LetterReceipt $receipt) {

            return route('@letter.letter.receipts.preview_receipt', [
                'receipt' => $receipt,
            ]);
        });

        $this->openUrlInNewTab();
    }
}
