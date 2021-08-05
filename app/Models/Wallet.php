<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id',
        'user_id',
        'uuid',
        'wallet_address',
        'wallet_no',
        'balance'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function token()
    {
        return $this->hasOne(Tokens::class, 'id', 'token_id');
    }

    public function getWalletNoAttribute($value)
    {
        $w_no = str_split($value, 4);
        $formatted_no = '';
        foreach($w_no as $key => $value)
        {
            if($key !== 3)
            {
                $formatted_no .= '**** ';
            } else {
                $formatted_no .= $value;
            }
        }

        return $formatted_no;
    }
}
