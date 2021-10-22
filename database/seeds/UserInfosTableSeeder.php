<?php

use App\UserInfo;
use Illuminate\Database\Seeder;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userInfo = new UserInfo();
        $userInfo->user_id = 1;
        $userInfo->address = 'Via Roma, 14';
        $userInfo->phone = '345783812945';
        $userInfo->save();
    }
}
