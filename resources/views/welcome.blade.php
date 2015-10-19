<!DOCTYPE html>
<html>
    <head>
        <title>Todo SMS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            img{
              border-radius: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">

              @if(isset($user))
              <h2>Welcome back {{$user['name']}}</h2>
              <img src="{{$user['avatar']}}"/>
              @endif
<form method="POST" action="/addTodo">
  {!! csrf_field() !!}

  <div>

      <input type="text" name="content" placeholder="Content" value="{{ old('content') }}">
  </div>



  <div>
      <button type="submit">Add Todo </button>
  </div>
</form>
            </div>
        </div>
    </body>
</html>
