<?php

namespace Database\Seeders;
use App\Models\message;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $message = message::factory()->count(5)->create();
    }
}
