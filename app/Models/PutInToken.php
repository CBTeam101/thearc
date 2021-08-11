<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PutInToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref',
        'token_id',
        'wallet_id',
        'user_id',
        'tokens',
        'current_price',
        'shares',
        'stop_at'
    ];
}
