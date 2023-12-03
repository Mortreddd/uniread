<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'fullname' => 'Emmanuel',
                'username' => 'cutiepatotie',
                'gender' => 'Male',
                'birthday' => '2002-09-25',
                'image' => 'storage/profiles/default-profile.jpg',
                'email' => 'emmanmale@gmail.com',
                'password' => Hash::make('emmanuelmale25'),
                'role' => 'author',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fullname' => 'Roselle Ann Manalansan',
                'username' => 'Teythewriter',
                'gender' => 'Female',
                'birthday' => '2002-09-25',
                'image' => 'storage/profiles/default-profile.jpg',
                'email' => 'roselleannmanalansan@gmail.com',
                'password' => Hash::make('teytey15'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fullname' => 'Emmanuel Male',
                'username' => 'emmanuel',
                'birthday' => '2002-09-25',
                'image' => 'storage/profiles/default-profile.jpg',
                'email' => 'emmanuelmale@gmail.com',
                'password' => Hash::make('emmanuelmale25'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fullname' => 'Bea Mangulabnan',
                'username' => 'beabanana',
                'gender' => 'Female',
                'birthday' => '2002-09-25',
                'image' => 'storage/profiles/default-profile.jpg',
                'email' => 'beamangulabnan05@gmail.com',
                'password' => Hash::make('beabaduday'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        foreach($authors as $author) {
            DB::table('authors')->insert($author);
        }
    }
}