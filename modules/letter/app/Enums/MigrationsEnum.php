<?php

namespace Venture\Letter\Enums;

enum MigrationsEnum
{
    case LETTER_RECEIPTS;
    case LETTER_RECEIPT_NOTES;
    case LETTER_RECEIPT_NOTE_ENTRIES;

    public function table(): string
    {
        return match ($this) {

            self::LETTER_RECEIPTS => 'letter_receipts',
            self::LETTER_RECEIPT_NOTES => 'letter_receipt_notes',
            self::LETTER_RECEIPT_NOTE_ENTRIES => 'letter_receipt_note_entries',
        };
    }
}
