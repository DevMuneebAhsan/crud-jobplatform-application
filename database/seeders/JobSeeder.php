<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Handle Tags: Only create if table is empty
        if (Tag::count() === 0) {
            $tags = Tag::factory(4)->create();
        } else {
            // If tags exist, grab them so we can attach them to jobs
            $tags = Tag::all();
        }

        // 2. Handle Jobs: Only create if table is empty
        if (Job::count() === 0) {
            Job::factory(20)
                ->hasAttached($tags) // Attach the tags we found or created above
                ->create(new Sequence(
                    [
                        'feature' => true,
                        'schedule' => 'Full Time'
                    ],
                    [
                        'feature' => false,
                        'schedule' => 'Part Time'
                    ],
                ));

            echo "Jobs and Tags seeded successfully.\n";
        } else {
            echo "Jobs table is not empty. Skipping seeding to prevent duplicates.\n";
        }
    }
}
