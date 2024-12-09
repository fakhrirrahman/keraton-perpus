<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use App\Models\User;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first()->id;
        Books::create([

            'title' => 'The Great Gatsby',
            'image' => 'the-great-gatsby.jpg',
            'author' => 'F. Scott Fitzgerald',
            'published_at' => '1925-04-10',
            'created_by' => $user,
            'updated_by' => $user,

        ]);
    }
}
