<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      


        $blog_one = new Blog();
        $blog_one->title = 'this is blog one title';
        $blog_one->title = 'this is blog one body';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'this is blog two title';
        $blog_two->title = 'this is blog two body';
        $blog_two->save();
    }
}
