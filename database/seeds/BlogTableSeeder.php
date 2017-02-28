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
        $blog_one->slug = 'blog-one-title';
        $blog_one->meta_title = 'Lorem ipsum dolor sit amet,';
        $blog_one->meta_desc = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
        $blog_one->title = 'this is blog one body';
        $blog_one->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'this is blog two title';
        $blog_two->slug = 'blog-two-title';
        $blog_two->meta_title = 'Lorem ipsum dolor sit amet';
        $blog_two->meta_desc = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit';
        $blog_two->title = 'this is blog two body';
        $blog_two->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
         $blog_two->save();


    }
}
