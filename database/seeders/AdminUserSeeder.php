<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Database\Seeder;
use \App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminEmail = 'admin@example.com';
        if (User::where('email', $adminEmail)->doesntExist()) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        User::factory()->count(38)->create();
    }
}
