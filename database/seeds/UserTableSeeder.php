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
        $user_one->email = 'miazyparvez@gmail.com';
        $user_one->password = bcrypt('123456');
        $user_one->save();

        $user_two = new User();
        $user_two->role_id = 2;
        $user_two->name = 'Parvez'; 
        $user_two->email = 'parvez@gmail.com';
        $user_two->password = bcrypt('parvez81410');
        $user_two->save();

      
    }
}
