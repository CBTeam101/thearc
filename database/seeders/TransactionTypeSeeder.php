<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction_types = [
            ['name' => 'Cash In - Tokens'],
            ['name' => 'Cash Out - Tokens']
        ];

        foreach($transaction_types as $type)
        {
            TransactionType::create($type);
        }
    }
}
