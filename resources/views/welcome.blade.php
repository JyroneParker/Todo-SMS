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
              @foreach ($todos as $todo)
              <p>{{ $todo->content }}</p>
              @endforeach
              <form method="POST" action="/addTodo">
                {!! csrf_field() !!}

                <div>

                    <input type="text" name="content" placeholder="Content" value="{{ old('content') }}">
                    <br>
                    <input type="tel" name="phone" placeholder="10 digit phone number" value="{{ old('phone') }}">
                    <select name="gateway">
                      <option value="@txt.att.net ">AT&T</option>
                      <option value="@mymetropcs.com">Metro PCS</option>
                      <option value="@messaging.sprintpcs.com">Sprint</option>
                      <option value="@tmomail.net">T-Mobile</option>
                      <option value="@vtext.com">Verizon</option>
                    </select>
                </div>



                <div>
                    <button type="submit">Add Todo </button>
                </div>
              </form>
              @else
              <form method="POST" action="/addTodo">
                {!! csrf_field() !!}

                <div>

                    <input type="text" name="content" placeholder="Content" value="{{ old('content') }}">
                    <br>
                    <input type="tel" name="phone" placeholder="10 digit phone number" value="{{ old('phone') }}">
                    <select name="gateway">
                      <option value="@txt.att.net ">AT&T</option>
                      <option value="@mymetropcs.com">Metro PCS</option>
                      <option value="@messaging.sprintpcs.com">Sprint</option>
                      <option value="@tmomail.net">T-Mobile</option>
                      <option value="@vtext.com">Verizon</option>
                    </select>
                </div>



                <div>
                    <button type="submit">Add Todo </button> <br> <a href="/auth/facebook">Connect With Facebook </a>
                </div>
              </form>
              @endif

            </div>
        </div>
    </body>
</html>
