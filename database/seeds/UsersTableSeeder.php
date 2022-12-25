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
            'over_name' => '佐藤',
            'under_name' => '優子',
            'over_name_kana' => 'サトウ',
            'under_name_kana' => 'ユウコ',
            'mail_address' => 'User@mailaddress.com',
            'sex' => '2',
            'birth_day' => '2000-04-04',
            'role' => '1',
            'password' => bcrypt('password'),
        ]);
    }
}
