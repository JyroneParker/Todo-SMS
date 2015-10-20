<!DOCTYPE html>
<html>
    <head>
        <title>Todo SMS</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-53029737-3', 'auto');
        ga('send', 'pageview');

        </script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Todo Top Banner -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7023023584987784"
             data-ad-slot="3867992558"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
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
            .facebook{
              border-radius: 50px;
            }
            #facebook{
              width:350px;
              height:105px;
            }
        </style>

    </head>
    <body>

        <div class="container">
            <div class="content">
              <h1>Todo SMS</h1>
              <p> This simple app allows you to create a todo item and send it to yourself as a text message. If you want persistence log in with Facebook!</p>
              @if(isset($user))
              <h2>Welcome back {{$user['name']}}</h2>
              <img class="facebook" src="{{$user['avatar']}}"/>
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
                    <button type="submit">Add Todo </button> <br> <a href="/auth/facebook">
                      <img id="facebook" src="http://cdn.wind8apps.com/wp-content/uploads/2015/06/facebook-connect.png"/></a>
                </div>
              </form>
              @endif

            </div>
        </div>
    </body>
</html>
