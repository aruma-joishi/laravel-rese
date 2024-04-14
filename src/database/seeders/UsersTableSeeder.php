<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '一郎',
            'email' => 'ichiro@com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '二郎',
            'email' => 'jiro@com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '三郎',
            'email' => 'saburo@com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '四郎',
            'email' => 'shiro@com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '五郎',
            'email' => 'goro@com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '六郎',
            'email' => 'rokuro@com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);
    }
}
