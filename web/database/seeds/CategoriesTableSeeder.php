<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('categories')->insert([
            [
                'categories_name' => 'レディース',
                'categories_date' => new DateTime(),
            ],
            [
                'categories_name' => 'メンズ',
                'categories_date' => new DateTime(),
            ],
            [
                'categories_name' => 'キッズ',
                'categories_date' => new DateTime(),
            ],
            [
                'categories_name' => 'インテリア',
                'categories_date' => new DateTime(),
            ],
            [
                'categories_name' => 'スポーツ',
                'categories_date' => new DateTime(),
            ],
            [
                'categories_name' => '本・音楽・ゲーム',
                'categories_date' => new DateTime(),
            ],
            [
                'categories_name' => '家電・スマホ・カメラ',
                'categories_date' => new DateTime(),
            ]
        ]);
    }
}
