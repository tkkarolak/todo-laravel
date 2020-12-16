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
                'color' => '#ff0000',
            ]);
        Priority::factory()
            ->create([
                'priority' => '2',
                'slug' => 'moderate',
                'color' => '#ffff00',
            ]);
        Priority::factory()
            ->create([
                'priority' => '3',
                'slug' => 'low',
                'color' => '#00ff00'
            ]);
    }
}
