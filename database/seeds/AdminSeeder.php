<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker;

        $user = new \App\User();

        $user->name = 'arwa';
        $user->type = 'admin';
        $user->email = 'arwa@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('987654321'); // password
        $user->remember_token = Str::random(20);

        $user->save();
    }
}
