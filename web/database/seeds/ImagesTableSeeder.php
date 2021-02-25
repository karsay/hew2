<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        DB::table('images')->insert([
            [
                'products_id' => 1,
                'images_path' => "img1.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 1,
                'image_path' => "img2.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 1,
                'image_path' => "img3.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 2,
                'image_path' => "img4.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 2,
                'image_path' => "img5.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 2,
                'image_path' => "img6.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 3,
                'image_path' => "img7.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 3,
                'image_path' => "img8.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 3,
                'image_path' => "img9.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

        ]);
    }
}
