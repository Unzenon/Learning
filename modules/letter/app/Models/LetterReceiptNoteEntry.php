<?php

namespace Venture\Letter\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->with('user');
    // }

    public function note()
    {
        return $this->belongsTo(LetterReceiptNote::class, 'receipt_note_id');
    }
}
