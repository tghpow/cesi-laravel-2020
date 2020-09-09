<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        \DB::table('contacts')->truncate();

        \DB::table('contacts')->insert([
            [
                'id' => 1,
                'email' => 'contact1@test.fr',
                'subject' => 'sujet1',
                'genre' => 'homme',
                'user_id' => null,
                'message' => 'message1',
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'email' => 'contact2@test.fr',
                'subject' => 'sujet2',
                'genre' => 'homme',
                'user_id' => null,
                'message' => 'message2',
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'email' => 'contact3@test.fr',
                'subject' => 'sujet3',
                'genre' => 'homme',
                'user_id' => 1,
                'message' => 'message3',
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'email' => 'contact4@test.fr',
                'subject' => 'sujet4',
                'genre' => 'homme',
                'user_id' => 1,
                'message' => 'message4',
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'email' => 'contact5@test.fr',
                'subject' => 'sujet5',
                'genre' => 'homme',
                'user_id' => 2,
                'message' => 'message5',
                'created_at' => $now,
            ],
        ]);
    }
}
