<?php

namespace Venture\Letter\Models;

use Illuminate\Database\Eloquent\Model;

class LetterReceiptNoteEntry extends Model
{
    protected $fillable = [
        'receipt_note_id',
        'invoice_date',
        'invoice_number',
        'amount',
        'description',
        'created_by',
    ];

    protected $table = 'letter_receipt_note_entries';

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });
    }

    public function note()
    {
        return $this->belongsTo(LetterReceiptNote::class, 'receipt_note_id');
    }
}
