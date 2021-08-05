<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Rejected'],
            ['name' => 'Cancel'],
            ['name' => 'Pending'],
            ['name' => 'Completed']
        ];

        foreach($statuses as $status)
        {
            Status::create($status);
        }
    }
}
