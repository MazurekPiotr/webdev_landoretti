<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 21; $i++) {
            DB::table('articles')->insert([
                'user_id' => 1,
                'title' => str_random(10),
                'style' => str_random(10),
                'year' => 2000,
                'width' => 50,
                'height' => 50,
                'depth' => 50,
                'description' => str_random(20),
                'condition' => str_random(5),
                'photo' => 'test.png',
                'color' => 'blue',
                'min_price' => 6000,
                'max_price' => 10000,
                'buyout_price' => 15000,
                'startdate' => \Carbon\Carbon::today(),
                'enddate' => \Carbon\Carbon::today(),
                'status' => 'active'
            ]);
        }
        for($i = 0; $i < 21; $i++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret')
            ]);
        }

    }
}
