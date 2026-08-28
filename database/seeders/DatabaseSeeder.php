<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil semua file seeder relasi utama
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProdukSeeder::class,
            PenjualanSeeder::class,
        ]);

        // Menggunakan firstOrCreate agar tidak error saat db:seed dijalankan berulang kali
        User::firstOrCreate(
            ['email' => 'test@example.com'], // Cek apakah email ini sudah ada
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Atur password default untuk login
                'role_id' => 4, // Menyesuaikan dengan role_id yang ada di log error Anda
            ]
        );
    }
}
