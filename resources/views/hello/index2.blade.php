@extends('layouts.helloapp')

@section("title", "Index")

@section("menubar")
  @parent
  インデックスページ
@endsection

@section("content")
  <p>ここが本文のテキストです。</p>
  <p>必要なだけ記述</p>

  @component('components.message')
    @slot('msg_title')
      CAUTION!
    @endslot

    @slot('msg_content')
      これはメッセージの表示です。
    @endslot
  @endcomponent

  @include('components.message', [
      "msg_title"   => "OK",
      "msg_content" => "サブビューです。"
  ])

  @each('components.item', $data, 'item')

  <p>Controller value<br>[message] = {{$message}}</p>
  <p>ViewComoser value<br>[view_message] = {{$view_message}}</p>
@endsection

@section("footer")
  copyright 2022 hello
@endsection
