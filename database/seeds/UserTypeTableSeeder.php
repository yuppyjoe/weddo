<?php

use App\UserType;
use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = ["admin", "client"];
        foreach ($userTypes as $type) {
            $u = new UserType;
            $u->name = $type;
            $u->save();
        }
    }
}
