<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        \DB::table('posts')->truncate();

        \DB::table('posts')->insert([
            [
                'id' => 1,
                'title' => 'post 1',
                'content' => 'contenu 1',
                'published_at' => $now,
                'user_id' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'title' => 'post 2',
                'content' => 'contenu 2',
                'published_at' => $now,
                'user_id' => 1,
                'created_at' => $now,
            ],

        ]);
    }
}
