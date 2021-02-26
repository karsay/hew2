<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'users_name' => '田中学',
                'users_email' => 'manabu@gmial.com',
                'users_gender' => '0',
                'users_birthday' => '2000/02/1',
                'users_postal_code' => '5009034',
                'users_state' => '長野県',
                'users_city' => '長野市五月雨町',
                'users_suburb' => '3丁目1',
                'users_profile' => '毎日勉強で忙しいです',
                'users_images_path' => 'test.jpg',
                'users_signup_date' => new DateTime(),

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'users_name' => '西川美希',
                'users_email' => 'mikimikinishi@gmial.com',
                'users_gender' => '1',
                'users_birthday' => '1988/12/30',
                'users_postal_code' => '1344411',
                'users_state' => '福岡県',
                'users_city' => '東国市一式町',
                'users_suburb' => '12-1',
                'users_profile' => '仕事で余ったものを出品しています。よろしくお願いします。',
                'users_images_path' => 'test.jpg',
                'users_signup_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'users_name' => '手須十湯座',
                'users_email' => 'test@test.com',
                'users_gender' => '1',
                'users_birthday' => '2000/07/26',
                'users_postal_code' => '5016237',
                'users_state' => '岐阜県',
                'users_city' => '羽島市市江吉良町',
                'users_suburb' => '1622-7',
                'users_profile' => 'HAL名古屋に通っています。いらない教科書や聖書などを出品しています。',
                'users_images_path' => 'test.jpg',
                'users_signup_date' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ]);

        factory(User::class, 50)->create();
    }
}
