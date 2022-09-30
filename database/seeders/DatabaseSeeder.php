<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Eloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();//關閉外鍵偵測
        DB::statement('SET FOREIGN_KEY_CHECKS=0');//關閉MySQL外鍵偵測
        $this->call([CategorySeeder::class]);
        $this->call([PostSeeder::class]);
        $this->call([TagSeeder::class]);
        $this->call([PostTagSeeder::class]);
        $this->call([ItemSeeder::class]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');//開啟MySQL外鍵偵測
        Eloquent::reguard();//開啟外鍵偵測
    }
}
