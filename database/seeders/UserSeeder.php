<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Enums\Role;
use App\Enums\Token;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'first_name' => 'Bank',
            'last_name' => 'Account',
            'contact_no' => '09559331401',
            'username' => 'axiebank',
            'email' => 'axiebusph@gmail.com',
            'password' => bcrypt('admin123'),
        ];

        $wallets = [
            [
                'token_id' => Token::XBT,
                'uuid' => Str::uuid(),
                'wallet_address' => Str::random(30),
                'wallet_no' => rand(9000000000000000, 9999999999999999),
                'balance' => 1000000
            ],
            [
                'token_id' => Token::BTT,
                'uuid' => Str::uuid(),
                'wallet_address' => Str::random(30),
                'wallet_no' => rand(9000000000000000, 9999999999999999),
                'balance' => 0
            ],
            [
                'token_id' => Token::WWT,
                'uuid' => Str::uuid(),
                'wallet_address' => Str::random(30),
                'wallet_no' => rand(9000000000000000, 9999999999999999),
                'balance' => 0
            ]
        ];

        $model = User::create($user);
        foreach($wallets as $wallet)
        {
            $model->wallets()->create($wallet);
        }
        $model->assignRole(Role::BANK);
    }
}
