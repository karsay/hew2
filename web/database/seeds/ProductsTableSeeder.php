<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'users_id' => 3,
                'products_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'users_id' => 3,
                'products_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'users_id' => 2,
                'products_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'users_id' => 1,
                'products_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'users_id' => 2,
                'products_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
