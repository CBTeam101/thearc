<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Enums\Role;

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

        // $this->bank = User::role(Role::BANK)->first();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // Invested tokens
        $tokenOnInvested = 100;
        $sharesPerMonth = .25;
        $grossPerMonth = $tokenOnInvested*$sharesPerMonth;
        $dailyEarnings = round($grossPerMonth/30, 2);

        // dd($dailyEarnings);

        return ;
    }
}
