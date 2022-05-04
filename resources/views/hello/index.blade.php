<html>
  <head>
    <title>Hello/Index</title>
    <style>
      body {font-size: 16px; color: #999;}
      h1   {font-size: 100pt; text-align: right; color:#eee; margin:40 0 -50 0;}
    </style>
  </head>
  <body>
      <h1>Index</h1>
      @if($msg != "")
        <p>こんにちは、{{$msg}}さん！</p>
      @else
        <p>Welcome、{{$msg}}さん！</p>
      @endif
      <p>{{$msg}}</p>
      <ol>
        @foreach ($data as $item)
            <li>{{$item}}</li>
        @endforeach
      </ol>

      <form method="POST" action="/hello/post">
        {{ @csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
      </form>
  </body>
</html>
