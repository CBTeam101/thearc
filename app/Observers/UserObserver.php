<?php

namespace App\Observers;

use App\Models\Tokens;
use App\Models\User;
use Illuminate\Support\Str;
use App\Enums\Role;

class UserObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $tokens = Tokens::all();

        if($user->username !== 'axiebank')
        {
            foreach($tokens as $token)
            {
                $user->wallets()->create([
                    'token_id' => $token->id,
                    'uuid' => Str::uuid(),
                    'wallet_address' => Str::random(30),
                    'wallet_no' => rand(9000000000000000, 9999999999999999),
                    'balance' => 0
                ]);
            }
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
