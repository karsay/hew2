<?php

use Illuminate\Database\Seeder;
use App\Models\product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(product::class, 42)->create();
    }



}
