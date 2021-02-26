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
            [
                'products_id' => 4,
                'image_path' => "7152987_6-e.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 4,
                'image_path' => "7152987_7-e.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 4,
                'image_path' => "7152987_8-e.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 4,
                'image_path' => "7152987_9-e.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 4,
                'image_path' => "7152987_12-e.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 5,
                'image_path' => "IMG_0419.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 5,
                'image_path' => "IMG_0420.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 5,
                'image_path' => "IMG_0421.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 6,
                'image_path' => "IMG_0368.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 6,
                'image_path' => "IMG_0369.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 6,
                'image_path' => "IMG_0370.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 7,
                'image_path' => "IMG_0371.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 7,
                'image_path' => "IMG_0372.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 7,
                'image_path' => "IMG_0373.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 8,
                'image_path' => "IMG_0380.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 8,
                'image_path' => "IMG_0381.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 8,
                'image_path' => "IMG_0382.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 9,
                'image_path' => "IMG_0383.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 9,
                'image_path' => "IMG_0384.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 9,
                'image_path' => "IMG_0385.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 10,
                'image_path' => "IMG_0386.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 10,
                'image_path' => "IMG_0387.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 10,
                'image_path' => "IMG_0388.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 11,
                'image_path' => "IMG_0389.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 11,
                'image_path' => "IMG_0390.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 11,
                'image_path' => "IMG_0391.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 12,
                'image_path' => "IMG_0392.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 12,
                'image_path' => "IMG_0393.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 12,
                'image_path' => "IMG_0394.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 12,
                'image_path' => "IMG_0395.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 13,
                'image_path' => "IMG_0396.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 13,
                'image_path' => "IMG_0397.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 13,
                'image_path' => "IMG_0398.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 14,
                'image_path' => "IMG_0399.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 14,
                'image_path' => "IMG_0400.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 14,
                'image_path' => "IMG_0401.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 15,
                'image_path' => "IMG_0402.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 15,
                'image_path' => "IMG_0403.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 15,
                'image_path' => "IMG_0404.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 16,
                'image_path' => "IMG_0405.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 16,
                'image_path' => "IMG_0406.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 16,
                'image_path' => "IMG_0407.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 17,
                'image_path' => "IMG_0408.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 17,
                'image_path' => "IMG_0409.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 17,
                'image_path' => "IMG_0410.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 18,
                'images_path' => "image0.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 19,
                'image_path' => "image1.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 19,
                'image_path' => "image2.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 19,
                'image_path' => "image3.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 20,
                'image_path' => "image4.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 20,
                'image_path' => "image5.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 20,
                'image_path' => "image6.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 21,
                'image_path' => "image7.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 21,
                'image_path' => "image8.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 21,
                'image_path' => "image9.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 21,
                'image_path' => "image10.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 21,
                'image_path' => "image11.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 21,
                'image_path' => "image12.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 21,
                'image_path' => "image13.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 22,
                'image_path' => "image14.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 22,
                'image_path' => "image15.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 22,
                'image_path' => "image16.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 23,
                'image_path' => "image17.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 23,
                'image_path' => "image18.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 23,
                'image_path' => "image19.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 23,
                'image_path' => "image20.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 24,
                'image_path' => "image21.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 25,
                'image_path' => "image22.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 26,
                'image_path' => "image23.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 26,
                'image_path' => "image24.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 26,
                'image_path' => "image25.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 27,
                'image_path' => "image26.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 28,
                'image_path' => "image27.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 28,
                'image_path' => "image28.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 29,
                'image_path' => "image29.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 29,
                'image_path' => "image30.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 30,
                'image_path' => "image31.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 30,
                'image_path' => "image32.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 30,
                'image_path' => "image33.jpg",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],[
                'products_id' => 31,
                'images_path' => "IMG-0261.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 31,
                'images_path' => "IMG-0263.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 31,
                'images_path' => "IMG-0264.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 31,
                'images_path' => "IMG-0265.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 32,
                'images_path' => "IMG-0232.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 32,
                'images_path' => "IMG-0234.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 33,
                'images_path' => "IMG-0244.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 33,
                'images_path' => "IMG-0245.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 33,
                'images_path' => "IMG-0246.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 34,
                'images_path' => "IMG-0241.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 34,
                'images_path' => "IMG-0242.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 34,
                'images_path' => "IMG-0243.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 35,
                'images_path' => "IMG-0247.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 35,
                'images_path' => "IMG-0249.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 35,
                'images_path' => "IMG-0251.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 36,
                'images_path' => "IMG-0253.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 36,
                'images_path' => "IMG-0254.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 36,
                'images_path' => "IMG-0257.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 37,
                'images_path' => "IMG-0272.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 37,
                'images_path' => "IMG-0273.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 37,
                'images_path' => "IMG-0274.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 38,
                'images_path' => "IMG-0275.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 38,
                'images_path' => "IMG-0276.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 38,
                'images_path' => "IMG-0279.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 39,
                'images_path' => "IMG-0280.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 39,
                'images_path' => "IMG-0281.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 40,
                'images_path' => "IMG-0283.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 40,
                'images_path' => "IMG-0284.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 40,
                'images_path' => "IMG-0285.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 41,
                'images_path' => "IMG-0288.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 41,
                'images_path' => "IMG-0289.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 42,
                'images_path' => "IMG-0290.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 42,
                'images_path' => "IMG-0296.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'products_id' => 42,
                'images_path' => "IMG-0297.JPG",
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]

        ]);
    }
}
