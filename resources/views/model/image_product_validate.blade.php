<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>
 
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
 
            .full-height {
                height: 100vh;
            }
 
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
 
            .position-ref {
                position: relative;
            }
 
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
 
            .content {
                text-align: center;
            }
 
            .title {
                font-size: 84px;
            }
 
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
 
            .m-b-md {
                margin-bottom: 30px;
            }
             
            .alert {
                color: red;
                font-weight: bold;
                margin: 10px;
            }
            .success {
                color: blue;
                font-weight: bold;
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            <div class="content">
                <div class="m-b-md">
                    <h1 class="title">Demo Event</h1>
                     
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     
                    @if (session('message'))
                        <div class="success">
                            {{ session('message') }}
                        </div>
                    @endif
                     
                    <form method="post"  enctype="multipart/form-data">
                        <div class="form-group">
						    <label for="email">Name :</label>
						    <input type="text" name="name" class="form-control" id="name">
						</div>
                      <div class="form-group">
                      	<label>Price</label>
                        <input  type="text" name="price" class="form-control"  />
                      </div>
                      <div class="form-group">
                      	<label>Content</label>
                        <input  type="text" name="content" class="form-control"  />
                      </div>
                      <div class="form-group">
                      	<label>Image</label>
                        <input type="file" class="form-control" name="demo_image" />
                      </div>
                      <br/>
                      <div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="btn btn-default" type="submit" value="Upload Image"/>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>