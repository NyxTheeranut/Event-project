<?php

use App\Models\User;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  Event
    //  Event_ID (PK)
    //  Title #String
    //  Description #String
    //  StartDateTime #DateTime
    //  EndDateTime #DateTime
    //  Budget #Double
    //  Organizer  #User_ID (FK)
    //  Status <'PLANNING', 'PENDING_APPROVAL', 'RECRUITING', 'ONGOING', 'OVER'>

    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description') -> nullable();
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time')->nullable();
            $table->double('budget') -> nullable();
            $table->foreignIdFor(User::class, 'organizer');
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
        Schema::dropIfExists('events');
    }
};
