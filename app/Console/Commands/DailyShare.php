<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PutInToken;
use App\Enums\Role;
use App\Enums\Token;
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
                $abitWallet = $p->user->wallets()->where('token_id', Token::ABIT)->first();
                $days = 30;
                $currentPrice= $p->token->price;
                $tokenOnInvested = (float)$p->tokens; // 4
                $sharesPerMonth = $p->token->share/100; // shares per month
                // dd($sharesPerMonth*$tokenOnInvested);
                $dailyGross = round($sharesPerMonth/$days*$tokenOnInvested, 2); // .66 or .67
                $deductionPerday = $currentPrice*Increment::DAILY_EARNING/$days;
                // dd($totalGross);
                // dd($dailyGross);
                // dd($p->token->price-(Increment::DAILY_EARNING*$dailyGross));

                // Update per token price
                $p->token->price = $currentPrice-$deductionPerday;
                $p->token->save();

                // Subtract from the bank wallet
                $b = $bank->wallets()->where('token_id', $p->token_id)->first();
                $b->balance = $b->balance-$dailyGross;
                $b->save();

                // Add to wallet
                $abitWallet->balance = $abitWallet->balance + $dailyGross;
                $abitWallet->save();
            });
        }
    }
}
