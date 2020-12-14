<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tags;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tags::all();

        $jobs = Job::factory()
            ->times(50)
            ->create();

        $jobs->each(function ($job, $key) use ($tags) {

            $rand = rand(0, 3);

            switch ($rand) {
                case 0:
                    break;
                case 1:
                    $tag_id = $tags->random()->id;
                    $job->tags()->attach($tag_id);
                    break;
                default:
                    $tags_temp = $tags->random($rand);
                    $tags_temp->each(function ($tag_temp, $key) use ($job) {
                        $job->tags()->attach($tag_temp->id);
                    });
                    break;
            }
            //  $job->tags()->attach($tags->random()->id);

        });
    }
}
