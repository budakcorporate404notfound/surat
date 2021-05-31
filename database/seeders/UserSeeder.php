<?php

namespace Database\Seeders;

// use App\User;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $user1 = new User();
        $user1->name = "Admin";
        $user1->email = "admin@gmail.com";
        $user1->password = bcrypt("admin");
        $user1->save();

        //Supervisoer
        $user2 = new User();
        $user2->name = "Supervisor";
        $user2->email = "supervisor@gmail.com";
        $user2->password = bcrypt("supervisor");
        $user2->save();

        //Staff
        $user3 = new User();
        $user3->name = "Staff";
        $user3->email = "staff@gmail.com";
        $user3->password = bcrypt("staff");
        $user3->save();
    }
}
