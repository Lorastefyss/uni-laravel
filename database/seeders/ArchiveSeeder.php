<?php

namespace Database\Seeders;

use App\Models\Archive;
use Illuminate\Database\Seeder;

class ArchiveSeeder extends Seeder
{
    public function run()
    {
        // Create 50 archives
        Archive::factory()
            ->count(150)
            ->create();
    }
}