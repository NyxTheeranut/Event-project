<?php

use App\Models\User;
use App\Models\Event;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * Run the migrations.
    */

    //  Application
    //  User_ID (FK)
    //  Event_ID (FK)
    //  Video_URL #String
    //  Message #String
    //  Status #String <PENDING, ACCEPT, REJECTED>

    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Event::class);
            $table->string('video_url')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_applications');
    }
};
