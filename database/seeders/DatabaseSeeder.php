<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'alamat' => 'admin',
            'role' => 'admin',
        'email' => 'admin@gmail.com',
        ]);

        user::create([
            'nama' => 'kelompok4',
            'username' => 'kelompok4',
            'password' => Hash::make('12345678'),
            'alamat' => 'kelompok4',
            'role' => 'user',
        'email' => 'kelompok4@gmail.com',
        ]);

        user::create([
            'nama' => 'pengelola',
            'username' => 'pengelola',
            'password' => Hash::make('12345678'),
            'alamat' => 'pengelola',
            'role' => 'pengelola',
        'email' => 'pengelola@gmail.com',
        ]);

        // pembayaran::create([
        //     'user_id' => '1',
        //     'nominal' => '1000',
        //     'status' => 'belum terbayar'
        // ]);

    }
}
