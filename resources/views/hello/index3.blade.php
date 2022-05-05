@extends('layouts.helloapp')

@section("title", "Index")

@section("menubar")
  @parent
  インデックスページ
@endsection

@section("content")
  <p>ここが本文のテキストです。</p>
  <table>
    @foreach($data as $item)
    <tr>
      <th>{{$item["name"]}}</th>
      <th>{{$item["mail"]}}</th>
    </tr>
    @endforeach
  </table>

  <p>これは、<middleware>google.com</middleware>のリンク。</p>
  <p>これは、<middleware>yahoo.com</middleware>のリンク。</p>

@endsection

@section("footer")
  copyright 2022 hello
@endsection
