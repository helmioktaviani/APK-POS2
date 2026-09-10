<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Membuat 1 akun Admin utama yang pasti
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 1, // Angka 1 berasumsi ID milik Admin di RoleSeeder Anda
        ]);

        // 2. Tetap membuat 5 user acak lainnya seperti sebelumnya
        User::factory()->count(5)->create();
    }
}
