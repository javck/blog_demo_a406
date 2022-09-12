<?php

namespace Database\Seeders;

use App\Models\PostTag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostTag::truncate();
        PostTag::factory(50)->create();
    }
}
