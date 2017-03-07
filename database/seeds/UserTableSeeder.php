<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user_one = new User();
        $user_one->role_id = 1;
        $user_one->name = 'Parvez Ahmed'; 
        $user_one->username = 'miazy33'; 
        $user_one->about = 'My Name Is Parvez Ahmed'; 
        $user_one->website = 'http://parvez.me/'; 
        $user_one->facebook = 'https://www.facebook.com/miazyparvez'; 
        $user_one->twitter = 'https://twitter.com/miazyparvez'; 
        $user_one->github = 'https://github.com/miazyparvez33'; 
        $user_one->email = 'miazyparvez@gmail.com';
        $user_one->password = bcrypt('123456');
        $user_one->save();

        $user_two = new User();
        $user_two->role_id = 2;
        $user_two->name = 'Parvez'; 
        $user_two->username = 'pavel33'; 
        $user_two->about = 'My Name Is Parvez'; 
        $user_two->website = 'My Name Is Parvez Ahmed'; 
        $user_two->facebook = 'https://www.facebook.com/parvez.hasanpabel'; 
        $user_two->twitter = 'My Name Is Parvez Ahmed'; 
        $user_two->github = 'My Name Is Parvez Ahmed'; 
        $user_two->email = 'parvez@gmail.com';
        $user_two->password = bcrypt('parvez81410');
        $user_two->save();

      
    }
}
