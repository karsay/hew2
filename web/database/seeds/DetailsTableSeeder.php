<?php

use Illuminate\Database\Seeder;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('details')->insert([
            [
                'products_id' => 1,
                'details_title' => 'Laravel参考書',
                'categories_id' => 6,
                'details_description' => 'めちゃくちゃ面白い本です。最初に買って読んだときはゲラゲラ笑っていました。',
                'details_price' => 1000,
                'details_state' => 0,
                'details_shipping_fee' => 0,
                'shipping_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 2,
                'details_title' => '応用情報でるとこ',
                'categories_id' => 6,
                'details_description' => 'めちゃくちゃ面白い本です。最初に買って読んだときはゲラゲラ笑っていました。',
                'details_price' => 2100,
                'details_state' => 0,
                'details_shipping_fee' => 0,
                'shipping_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 3,
                'details_title' => 'チョコレート',
                'categories_id' => 5,
                'details_description' => 'ハリーポッターに出てくるチョコレートです。ダンブルドアが出てくると良いですね。',
                'details_price' => 300,
                'details_state' => 0,
                'details_shipping_fee' => 0,
                'shipping_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);
    }
}
