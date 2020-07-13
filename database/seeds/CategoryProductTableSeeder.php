<?php

use Illuminate\Database\Seeder;
use App\CategoryProduct;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CategoryProduct::class, 10)->create();
    }
}
