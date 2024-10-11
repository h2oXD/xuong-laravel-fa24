<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClassroomSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(PassportSeeder::class);
        $this->call(SubjectSeeder::class);
        // for ($i=0; $i < 10; $i++) { 
        //     Role::create([
        //         'name' => fake()->text(20),
        //     ]);
        // }
        // for ($i=1; $i < 11; $i++) { 
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text(50),
        //     ]);
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text(50),
        //     ]);
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text(50),
        //     ]);
        // }
        // $userIDs = User::pluck('id')->all();

        // foreach ($userIDs as $userID) {
        //     Phone::query()->create([
        //         'user_id' => $userID,
        //         'value' => fake()->phoneNumber(),
        //     ]);
        // }

        // $this->call(ProjectSeeder::class);
        // $this->call(TaskSeeder::class);
        // $this->call(EmployeeSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
