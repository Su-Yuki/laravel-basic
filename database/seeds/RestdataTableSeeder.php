<?php

use App\Restdata;
use Illuminate\Database\Seeder;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            "message" => "Google japan",
            "url"     => "https://www.gogle.co.jp"
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        $param = [
            "message" => "Yahoo japan",
            "url"     => "https://www.yahoo.co.jp"
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
        $param = [
            "message" => "MSN japan",
            "url"     => "https://www.msn.co.jp"
        ];
        $restdata = new Restdata;
        $restdata->fill($param)->save();
    }
}
