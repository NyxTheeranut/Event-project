<?php

namespace Database\Seeders;

use App\Models\KanbanBoard;
use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Shameless Hard Code Kanban Board
        $kanban_board = new KanbanBoard();
        $kanban_board->event_id = 1;
        $kanban_board->save();

        Work::factory(20)->create();
    }
}