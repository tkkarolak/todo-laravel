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
                    $tagId = $tags->random()->id;
                    $job->tags()->attach($tagId);
                    break;
                default:
                    $tagsTemp = $tags->random($rand);
                    $tagsTemp->each(function ($tagTemp, $key) use ($job) {
                        $job->tags()->attach($tagTemp->id);
                    });
                    break;
            }
            //  $job->tags()->attach($tags->random()->id);

        });
    }
}
