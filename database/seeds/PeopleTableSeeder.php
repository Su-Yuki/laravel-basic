<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "name" => "taro",
            "mail" => "taro@example.com",
            "age"  => 20,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "hana",
            "mail" => "hana@example.com",
            "age"  => 20,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "kana",
            "mail" => "kana@example.com",
            "age"  => 20,
        ];
        DB::table('people')->insert($param);
    }
}
