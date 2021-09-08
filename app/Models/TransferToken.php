<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'recipient_id',
        'token_id',
        'token',
        'current_price',
        'status_id',
        'description',
    ];

    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function recipient()
    {
        return $this->hasOne(User::class, 'id', 'recipient_id');
    }

    public function tokenType()
    {
        return $this->hasOne(Tokens::class, 'id', 'token_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
