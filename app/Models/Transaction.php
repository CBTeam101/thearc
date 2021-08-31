<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'tr_no',
        'user_id',
        'user_wallet_id',
        'transaction_type_id',
        'amount',
        'token',
        'current_price',
        'uuid',
        'description',
        'token_id',
        'status_id',
        'encoded_by',
        'approved_at'
    ];

    public function tokenModel()
    {
        return $this->hasOne(Tokens::class, 'id', 'token_id');
    }

    public function type()
    {
        return $this->hasOne(TransactionType::class, 'id', 'transaction_type_id');
    }

    public function file()
    {
        return $this->hasOne(TransactionFile::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'id', 'user_wallet_id');
    }

    public function tokenInfo()
    {
        return $this->hasOne(Tokens::class, 'id', 'token_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
