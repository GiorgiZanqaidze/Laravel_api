<?php

namespace Database\Seeders;

use App\Models\Friendship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of fake friendships you want to create
        $numberOfFriendships = 100;

        // Create fake friendships using the FriendshipFactory
        Friendship::factory($numberOfFriendships)->create();
    }
}
