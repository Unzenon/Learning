<?php

namespace Venture\Letter\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->with('user');
    // }

    public function user()
    {
        return $this->belongsTo(\Venture\Home\Models\User::class);
    }

    public function entries()
    {
        return $this->hasMany(LetterReceiptNoteEntry::class);
    }
}
