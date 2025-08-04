<?php

namespace Venture\Letter\Models;

use Venture\Home\Models\User;
use Illuminate\Database\Eloquent\Model;

class LetterReceiptNote extends Model
{
    protected $fillable = [
        'date',
        'day',
        'from',
        'to',
        'notes',
        'user_id',
    ];

    protected $table = 'letter_receipt_notes';

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(LetterReceiptNoteEntry::class);
    }
}
