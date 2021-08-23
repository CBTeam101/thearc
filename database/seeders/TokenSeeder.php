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
                'av' => 'ABT',
                'name' => 'AxieBusToken',
                'share' => 20,
                'img' => 'images/card/card1.png',
                'price' => 1000
            ],
            [
                'av' => 'ABIT',
                'name' => 'AxieBusinessInterestToken',
                'share' => 30,
                'img' => 'images/card/card3.png',
                'price' => 1000
            ],
            // [
            //     'av' => 'BTT',
            //     'name' => 'BethylTradeToken',
            //     'share' => 30,
            //     'img' => 'images/card/card2.png',
            //     'price' => 1000
            // ],
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
