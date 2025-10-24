<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Donation;
use App\Models\ProjectUpdate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();

        $projects = Project::factory()->count(20)->create();

        foreach ($projects as $project) {
            ProjectUpdate::factory()
                ->count(rand(2, 5))
                ->create([
                    'project_id' => $project->id,
                ]);
        }

        for ($i = 0; $i < 200; $i++) {

            $project = $projects->random();

            $trees = rand(1, 15);
            $amount = $project->cost_per_tree * $trees;


            Donation::factory()->create([
                'project_id' => $project->id,
                'user_id' => null,
                'donor_name' => fake()->name(),
                'donor_email' => fake()->safeEmail(),
                'amount' => $amount,
                'tree_quantity' => $trees,
                'status' => 'paid',
            ]);
        }
    }
}
