<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'trade_code',
        'high',
        'low',
        'open',
        'close',
        'volume',
    ];
    protected $dates = ['date'];

}
