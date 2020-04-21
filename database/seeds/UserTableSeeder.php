<?php

use App\User;
use App\UserProfile;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->user_type_id = 1;
        $user->username = "admin";
        $user->email = "admin@weddo.com";
        $user->password = bcrypt("admin");
        $user->active = true;
        $user->save();

        $profile = new UserProfile;
        $profile-> user_id = $user->id;
        $profile-> first_name = "Admin";
        $profile-> last_name = "User";
        $profile-> phone_number = "0700112233";
        $profile->save();
    }
}
