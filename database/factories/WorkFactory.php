<?php

namespace Database\Factories;

use App\Models\KanbanBoard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realTextBetween(10, 20),
            'description' => fake()->realTextBetween(15, 30),
            'status' => fake()->randomElement(['PLANNING', 'IN_PROGRESS', 'REVIEW', 'DONE']),
            'kanban_board_id' => KanbanBoard::all()->random()->id
        ];
    }
}
