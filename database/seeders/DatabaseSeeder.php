<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homefeed;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Homefeed::factory()->count(30)->create();
        category::factory()->count(3)->create();
        Comment::factory()->count(80)->create();

        User::factory()->create([
            'name' => 'Jack',
            'email'=> 'jack@gmail.com'
        ]);

        User::factory()->create([
            'name' => 'Nolan',
            'email'=> 'nolan@gmail.com'
        ]);




    }
}
