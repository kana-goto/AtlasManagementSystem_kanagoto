<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'over_name' => 'User',
            'under_name' => 'Name',
            'over_name_kana' => 'ユーザー',
            'under_name_kana' => 'ネーム',
            'mail_address' => 'User@mailaddress.com',
            'sex' => '0',
            'birth_day' => '1996-06-08',
            'role' => '0',
            'password' => bcrypt('password'),
        ]);
    }
}
