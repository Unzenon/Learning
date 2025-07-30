<?php

namespace Venture\Letter\Models;

use Illuminate\Database\Eloquent\Model;

class LetterReceipt extends Model

{

    public function getTable(): string
    {
        return \Venture\Letter\Enums\MigrationsEnum::RECEIPTS->table();
    }
    protected $fillable = [
        'date',
        'received_from',
        'amount',
        'payment_for',
        'created_by',
    ];
}