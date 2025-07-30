<?php

namespace Venture\Letter\Models;

use Illuminate\Database\Eloquent\Model;

class TandaTerima extends Model
{
    protected $fillable = [
        'date',
        'received_from',
    ];
    protected $table = 'letter_tandaterimas';
}
