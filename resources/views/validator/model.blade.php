<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>Validator Form </h2>
      @foreach ($errors->all() as $error)
        <ul>
          <li class="alert alert-danger"> {{ $error }} </li>
        </ul>
      @endforeach
    <form method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="username"> Name: </label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="username">
      </div>
      <div class="form-group">
        <label for="email"> Email: </label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter first password" name="password">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

</body>
</html>
