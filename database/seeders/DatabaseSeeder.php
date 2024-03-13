<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MiniTwitter;
use Database\Factories\MiniTwitterFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ('vorname');
        //     $table->string('nachname');
        //     $table->string('email');
        //     $table->string('tweet_title');
        //     $table->string('tweet_text');


        MiniTwitter::create([
            'vorname' => 'user_1_vorname',
            'nachname' => 'user_1_nachname',
            'email' => 'user_1@mail.com',
            'tweet_title' => 'My First Tweet',
            'tweet_text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium commodi soluta debitis beatae totam ipsa? Saepe laborum eveniet, beatae quasi excepturi accusamus ipsum inventore ut officia numquam, velit repellat dolorum?'

        ]);

        MiniTwitter::create([
            'vorname' => 'user_2_vorname',
            'nachname' => 'user_2_nachname',
            'email' => 'user_2@mail.com',
            'tweet_title' => 'My First Tweet',
            'tweet_text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium commodi soluta debitis beatae totam ipsa? Saepe laborum eveniet, beatae quasi excepturi accusamus ipsum inventore ut officia numquam, velit repellat dolorum?'

        ]);

        MiniTwitter::factory(10)->create();
    }
}
