<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('likes')->insert([
            [
                'products_id' => 1,
                'users_id' => 1,
                'likes_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 1,
                'users_id' => 2,
                'likes_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 1,
                'users_id' => 3,
                'likes_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 2,
                'users_id' => 3,
                'likes_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],


        ]);
    }
}
