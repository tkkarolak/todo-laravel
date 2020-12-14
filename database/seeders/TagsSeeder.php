<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tags::factory()
            ->create([
                'tag' => 'work',
            ]);
        Tags::factory()
            ->create([
                'tag' => 'university',
            ]);
        Tags::factory()
            ->create([
                'tag' => 'chores',
            ]);
    }
}
