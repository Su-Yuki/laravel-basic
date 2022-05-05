<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Validator;

// --------------------------------------------------------------------------------
// ---[ process ]------------------------------------------------------------------
global $head, $style, $body, $end;

$head  = "<html><head>";
$body  = "</head><body>";
$end   = "</body></html>";
$style = <<<EOF
  <style>
    body {font-size: 16px; color: #999;}
    h1   {font-size: 100pt; text-align: right; color:#eee; margin:40 0 -50 0;}
  </style>
EOF;

function tag($tag, $txt) {
  return "<{$tag}>" . $txt . "</{$tag}>";
}

// ---[ class ]--------------------------------------------------------------------
class HelloController extends Controller
{
  public function index() {
    global $head, $style, $body, $end;

    $html = $head
      . tag("title", "Hello/Index")
      . $style
      . $body
      . tag("h1", "Index")
      . tag("p", "this is Index page")
      . $end;
    return $html;
  }

  public function other() {
    global $head, $style, $body, $end;

    $html = $head
      . tag("title", "Hello/Other")
      . $style
      . $body
      . tag("h1", "Other")
      . tag("p", "this is other page")
      . $end;
    return $html;
  }

  public function request(Request $request, Response $response) {
    global $head, $style, $body, $end;

    $html = $head
    . tag("title", "Hello/Other")
    . $style
    . $body
    . tag("h1", "Other")
    . tag("p", "this is other page")
    . "<br><br>"
    . "<h4>request</h4>"
    . $request
    . "<br><br>"
    . "<h4>request url</h4>"
    . $request -> url()
    . "<br><br>"
    . "<h4>request fullUrl</h4>"
    . $request -> fullUrl()
    . "<br><br>"
    . "<h4>request path</h4>"
    . $request -> path()
    . "<br><br>"
    . "<h4>response</h4>"
    . $response
    . "<br><br>"
    . "<h4>response status</h4>"
    . $response -> status()
    . "<br><br>"
    . "<h4>response content</h4>"
    . $response -> content()
    . "<br><br>"
    . "<h4>response setContent</h4>"
    . $response -> setContent("[OK]. this is set content")
    . "<br><br>"
    . $end;
  return $html;
  }

  public function helloIndex(Request $request) {
    $data = [
        "msg" => "これはコントローラから渡されたメッセージです。",
        "id"  => $request->id
    ];
    return view("hello.index", $data);
  }

  public function index2() {
    $data = [
      ["name" => "山田", "mail" => "sample@example.com"],
      ["name" => "鈴木", "mail" => "sample@example.com"],
      ["name" => "佐藤", "mail" => "sample@example.com"],
      ["name" => "富田", "mail" => "sample@example.com"],
      ["name" => "村田", "mail" => "sample@example.com"]
    ];

    return view("hello.index2", [
        "data"    => $data,
        "message" => "Hello!"
    ]);
  }

  //  middleware
  public function index3(Request $request) {
    return view("hello.index3", ["data"=>$request->data]);
  }

  //  validation
  public function index4(Request $request) {
    $validator = Validator::make($request->query(), [
        "id"   => "required",
        "pass" => "required",
    ]);

    if($validator->fails()){
      $msg = "クエリに問題があります。";
    }else{
      $msg = "ID/PASSを受け付けました。フォームを入力ください。";
    }

    return view("hello.index5", ["msg"=>$msg]);
  }


  // ---[ post ]-------------------------------------------------------------------
  public function post(Request $request) {
    $data = [
      "one",
      "two",
      "three",
      "for",
      "five"
    ];

    return view("hello.index", [
        "msg"  => $request->msg,
        "data" => $data
    ]);
  }

//   public function post_validate(HelloRequest $request) {
//     return view("hello.index4", ["msg"=>"正しく入力されました。"]);
//   }
    public function post_validate(Request $request) {
      $rules = [
        "name"          => "required",
        "mail"          => "email",
        "age"           => "numeric",
      ];
      $messages = [
        "name.required" => "カスタムエラー：name",
        "mail.email"    => "カスタムエラー：mail",
        "age.numeric"   => "カスタムエラー：age1",
        "age.min"       => "カスタムエラー：age2",
        "age.max"       => "カスタムエラー：age3",
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      $validator->sometimes("age", "min:0", function($input){
        return !is_int($input->age);
      });
      $validator->sometimes("age", "max:200", function($input){
        return !is_int($input->age);
      });

      if($validator->fails()){
        return redirect("/hello/index4")
          ->withErrors($validator)
          ->withInput();
      }

      return view("hello.index4", ["msg"=>"正しく入力されました。"]);
    }

    // index5
    public function index5(Request $request) {
      return view("hello.index5", ["msg"=>"フォームを入力ください。"]);
    }

    public function post_validate2(HelloRequest $request) {
      return view("hello.index5", ["msg"=>"正しく入力されました。"]);
    }
}
