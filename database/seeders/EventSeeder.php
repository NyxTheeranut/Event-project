<?php

namespace Database\Seeders;

use App\Models\KanbanBoard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $event = new Event();
            $event->title = fake()->realTextBetween(10, 20);
            $event->description = "description";
            $event->start_date_time = fake()->dateTime();
            $event->end_date_time = fake()->dateTime();
            $event->budget = fake()->randomNumber();
            $event-> organizer = 2;
            $event->save();

            // Shameless Hard Code Kanban Board
            $kanban_board = new KanbanBoard();
            $kanban_board->event_id = $event->id;
            $kanban_board->save();
        }

    }
}
