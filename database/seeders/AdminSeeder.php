<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin::factory()->create();
        DB::table('admins')->insert([
            [
                'fullname' => 'Roselle Ann Manalansan',
                'username' => 'Teythewriter',
                'email' => 'roselleannmanalansan@gmail.com',
                'password' => Hash::make('teytey15'),
            ],
            [
                'fullname' => 'Emmanuel Male',
                'username' => 'emmanuel',
                'email' => 'emmanuelmale@gmail.com',
                'password' => Hash::make('emmanuelmale25'),
            ],
            [
                'fullname' => 'Bea Mangulabnan',
                'username' => 'beabanana',
                'email' => 'beamangulabnan05@gmail.com',
                'password' => Hash::make('beabaduday'),
            ]
        ]);
    }
}