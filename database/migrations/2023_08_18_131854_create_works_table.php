<?php

use App\Models\KanbanBoard;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  Work
    //  Work_ID (PK)
    //  Board_ID (FK)
    //  WorkName #String
    //  Description #String
    //  Status <PlANNING, Ongoing, Review, Done>

    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KanbanBoard::class);
            $table->string('workname');
            $table->string('description');
            $table->string('status')->default('PLANNING');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
