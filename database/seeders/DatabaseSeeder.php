<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminUser;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         Post::factory(10)->create();

        AdminUser::factory(1)->create([
             'name' => 'Livis',
             'email' => 'test@example.com',
             'password' => bcrypt('123456'),
         ]);
    }
}
