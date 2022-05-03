<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
