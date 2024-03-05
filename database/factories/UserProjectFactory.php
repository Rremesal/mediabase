<?php

namespace Database\Factories;

use App\Models\project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user_project>
 */
class UserProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory(1)->create();
        $project = project::factory(1)->create();

        return [
            'project_id' => $project->id,
            'user_id' => $user->id,
        ];
    }
}
