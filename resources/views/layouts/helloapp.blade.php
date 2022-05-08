<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
      body {
          font-size:        16pt;
          color:          #999;
          margin:           5px;
      }
      h1 {
        font-size:          50pt;
        text-align:         right;
        color:              5px;
      }
      ul {
        font-size:          12pt;
      }
      hr {
        font-size:          25px 100px;
        border-top:         1px dashed #ddd;
      }
      th {
        background-color: #999;
        color:            #fff;
        padding:            5px 10px;
      }
      td {
        border:             solid 1px #aaa;
        color:            #999;
        padding:            5px 10px;
      }
      .menutitle {
        font-size:          14pt;
        font-weight:        bold;
        margin:             0px;
      }
      .content {
        margin:             10px;
      }
      .footer {
        text-align:         right;
        font-size:          10pt;
        margin:             10px;
        border-bottom:      solid 1px #ccc;
        color:            #ccc;
      }
    </style>
  </head>
  <body>
      <h1>@yield("title")</h1>
      @section('menubar')
      <ul>
        <p class="menutitle">※メニュー</p>
        <li>@show</li>
      </ul>
      <hr size="1">
      <div class="content">
        @yield("content")
      </div>
      <div class="footer">
        @yield("footer")
      </div>
    </body>
</html>
