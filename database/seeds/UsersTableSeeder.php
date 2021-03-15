<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'd.prytckov@yandex.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
                'api_token' => 'jd9fh982h98dh9hd03hfh2hf2oi3hdioh23iooi2h3fio2hi2hf3io2i2',
            ]
        );
    }
}
