<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat_one = new Category();
        $cat_one->name = 'php';
        $cat_one->slug = 'PHP';
        $cat_one->save();

        $cat_two = new Category();
        $cat_two->name = 'laravel';
        $cat_two->slug = 'LARAVEL';
        $cat_two->save();

       
    }
}
