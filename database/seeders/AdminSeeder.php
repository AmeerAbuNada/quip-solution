<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::factory(100)->create();
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
        ]);
    }
}
