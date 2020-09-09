<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        \DB::table('users')->truncate();

        \DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'user1@test.fr',
                'name' => 'user1',
                'password' => \Hash::make('secret'),
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'email' => 'user2@test.fr',
                'name' => 'user2',
                'password' => \Hash::make('secret'),
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'email' => 'user3@test.fr',
                'name' => 'user3',
                'password' => \Hash::make('secret'),
                'created_at' => $now,
            ]
        ]);
    }
}
