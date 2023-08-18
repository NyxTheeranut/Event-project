<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  User
    //  User_ID (PK)
    //  NickName #String
    //  FirstName #String
    //  LastName #String
    //  Email #String
    //  Password {Hash} #String
    //  BirthDate #Date
    //  Role <'Member', 'Staff', 'Accountant'>
    //  ProfilePicture_Path #String
    
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birthdate')->nullable();
            $table->enum('role', ['Member', 'Staff', 'Accountant'])->default('Member');
            $table->string('profilepicture_path')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
