<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('books')->insert([
            'title' => 'Memory',
            'genre_id' => 3,
            'description' => 'In purgatory, he has to piece together his jumbled memories',
        ]);
    }
}
