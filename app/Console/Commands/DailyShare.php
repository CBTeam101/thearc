<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PutInToken;
use App\Enums\Role;
use App\Enums\Increment;

class DailyShare extends Command
{

    private $bank;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate daily earnings.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->bank = User::role(Role::BANK)->first();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $putins = PutInToken::whereNull('stop_at')->get();
        $bank = $this->bank;

        foreach($putins as $p)
        {
            DB::transaction(function() use ($p, $bank) {
                $tokenOnInvested = (float)$p->tokens;
                $sharesPerMonth = round($p->token->share/100, 2);//.25;
                $dailyGross = round($sharesPerMonth/30, 2);
                $totalGross = $tokenOnInvested*$dailyGross;

                // Increase token price
                $p->token->price = $p->token->price+(Increment::DAILY_EARNING*$p->tokens);
                $p->token->save();

                // Subtract from the bank wallet
                $b = $bank->wallets()->where('token_id', $p->token_id)->first();
                $b->balance = $b->balance-$totalGross;
                $b->save();

                // Add to wallet
                $p->wallet->balance = $p->wallet->balance + $totalGross;
                $p->wallet->save();
            });
        }
    }
}
