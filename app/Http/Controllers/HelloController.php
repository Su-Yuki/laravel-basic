<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    // ---[ Auth ]-------------------------------------------------------------------
    public function getAuth(Request $request)
    {
      $param = ["message" => "ログインしてください"];
      return view("hello.auth", $param);
    }

    public function postAuth(Request $request)
    {
      $email    = $request->email;
      $password = $request->password;
      if(Auth::attempt([
        "email"    => $email,
        "password" => $password,
      ])){
        $msg = "ログインしました。（". Auth::user()->name. ")";
      }else{
        $msg = "ログイン失敗しました。";
      }
      return view("hello.auth", ["message" => $msg]);
    }

    // ---[          ]---------------------------------------------------------------
    public function index(Request $request)
    {
        $user = Auth::user();

        $sort  = $request->sort;
        if(empty($sort)){
            $items = DB::table('people')->paginate(3);
        }else{
            $items = DB::table('people')->orderBy($sort, "asc")->paginate(3);
        }
        $param = [
            "items" => $items,
            "sort" => $sort,
            "user" => $user,
        ];
        return view("hello.index", $param);
    }

    public function rest(Request $request)
    {
        return view("hello.rest");
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get("msg");
        return view("hello.session", ["session_data" => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put("msg", $msg);
        return redirect("hello/session");
    }
}
