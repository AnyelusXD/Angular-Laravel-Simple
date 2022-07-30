<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $user= new User(); 

        $user->name="user1";
        $user->lastname="gel";
        $user->phone="2121780006";
        $user->direction="Calle 12";
        $user->cp="540001";
        $user->email="admin@123.com";
        $user->password="11223344";
        $user->profile="1";

        $user->save();

        $user1= new User(); 

        $user->name="user2";
        $user->lastname="gel";
        $user->phone="2121780006";
        $user->direction="Calle 12";
        $user->cp="540001";
        $user->email="admin2@123.com";
        $user->password="11223344";
        $user->profile="1";

        $user1->save();

        
    }
}
