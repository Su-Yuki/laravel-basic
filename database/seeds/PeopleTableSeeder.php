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
            "age"  => 10,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "hana",
            "mail" => "hana@example.com",
            "age"  => 15,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "kana",
            "mail" => "kana@example.com",
            "age"  => 20,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "mana",
            "mail" => "mana@example.com",
            "age"  => 25,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "kiku",
            "mail" => "kiku@example.com",
            "age"  => 30,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "fuga",
            "mail" => "fuga@example.com",
            "age"  => 35,
        ];
        DB::table('people')->insert($param);

        $param = [
            "name" => "hoge",
            "mail" => "hoge@example.com",
            "age"  => 40,
        ];
        DB::table('people')->insert($param);
    }
}
