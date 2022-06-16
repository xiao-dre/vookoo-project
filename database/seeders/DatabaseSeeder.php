<?php

namespace Database\Seeders;

use App\Models\Inbox;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            UserRoleSeeder::class,
            GenreSeeder::class,
            UserSeeder::class,
            BookSeeder::class
        ]);
    }
}
