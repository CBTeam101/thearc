<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tokens as Token;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tokens = [
            [
                'av' => 'XBT',
                'name' => 'AxieBusToken',
                'share' => 30,
                'img' => 'images/card/card1.png',
                'price' => 100
            ],
            [
                'av' => 'BTT',
                'name' => 'BethylTradeToken',
                'share' => 30,
                'img' => 'images/card/card2.png',
                'price' => 100
            ],
            [
                'av' => 'WWT',
                'name' => 'WonderWhiteToken',
                'share' => 30,
                'img' => 'images/card/card3.png',
                'price' => 100
            ],
            // [
            //     'av' => 'WWT',
            //     'name' => 'WonderWhiteToken',
            //     'share' => 30,
            //     'img' => 'images/card/card4.png'
            // ],
        ];

        foreach($tokens as $token)
        {
            Token::create($token);
        }
    }
}
