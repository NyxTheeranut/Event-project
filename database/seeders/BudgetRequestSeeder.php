<?php

namespace Database\Seeders;

use App\Models\BudgetRequest;
use App\Models\Event;
use App\Models\KanbanBoard;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        Schema::create('budget_requests', function (Blueprint $table) {
//            $table->id();
//            $table->foreignIdFor(Event::class)->constrained('events');
//            $table->string('status')->default('PENDING');
//            $table->string('reason');
//            $table->timestamps();
//            $table->softDeletes();
//        });

//        'title' => fake()->realTextBetween(10, 20),
//        'description' => fake()->realTextBetween(15, 30),
//        'status' => fake()->randomElement(['PLANNING', 'IN_PROGRESS', 'REVIEW', 'DONE']),
//        'kanban_board_id' => KanbanBoard::all()->random()->id

        if (BudgetRequest::count() > 0) {
            return;
        }

        for ($i = 0; $i < (Event::count() - BudgetRequest::count()); $i++) {
            $budgetRequest = new BudgetRequest();
            $randomEvent = Event::all()->random()->id;
            $found = false;
            for ($j = 0; $j < count(BudgetRequest::get()); $j++) {
                if ($randomEvent === BudgetRequest::get()[$j]->event_id) {
                    $found = true;
                    break;
                }
            }
            if ($found) {
                continue;
            }
            $budgetRequest->event_id = $randomEvent;
            $budgetRequest->status = fake()->randomElement(['PENDING', 'APPROVED', 'REJECTED']);
            $budgetRequest->reason = fake()->realTextBetween(10, 20);
            $budgetRequest->save();
        }
    }
}
