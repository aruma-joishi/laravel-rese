<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'shop_id' => '2',
            'user_id' => '2',
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'shop_id' => '4',
            'user_id' => '4',
        ];
        DB::table('favorites')->insert($param);
    }
}