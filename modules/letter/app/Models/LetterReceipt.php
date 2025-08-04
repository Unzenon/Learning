<?php

namespace Venture\Letter\Models;


use Venture\Home\Models\User;
use Illuminate\Database\Eloquent\Model;

class LetterReceipt extends Model
{
    protected $fillable = [
        'date',
        'received_from',
        'amount',
        'payment_for',
        'created_by',
    ];

    protected $table = 'letter_receipts';

    protected static function booted(): void
    {
        static::creating(function ($receipt) {
            $receipt->created_by = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
