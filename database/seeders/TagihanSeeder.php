<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pembayaran;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pembayaran::create([
        //     'nama' => \App\Models\User::where('nama')->first()->nama,
        //     'nominal' => '1000',
        //     'status' => 'belum terbayar'
        // ]);

        pembayaran::create([
            'user_id' => '1',
            'nominal' => '1000',
            'status' => 'belum terbayar'
        ]);
    }
}
