<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::factory()
            ->create([
                'priority' => '1',
                'slug' => 'high',
            ]);
        Priority::factory()
            ->create([
                'priority' => '2',
                'slug' => 'moderate',
            ]);
        Priority::factory()
            ->create([
                'priority' => '3',
                'slug' => 'low',
            ]);
    }
}
