<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User who initiates the friendship
            $table->unsignedBigInteger('friend_id'); // User who is the friend
            $table->string('status')->default('pending'); // Friendship status (e.g., pending, accepted)
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('friend_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('friendships');
    }
};
