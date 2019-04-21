<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="padding-top: 20px;">

<form action="{{ route('users.search') }}" method="POST">
{{csrf_field()}}
	@if(session('error'))
		<div class="alert alert-danger">{{ session('error') }}</div>
	@endif
<div class="form-group">
<input id="user_id" class="form-control" name="user_id" type="text" value="{{ old('user_id') }}" placeholder="User ID">
</div>
<input class="btn btn-info" type="submit" value="Search">
</form>
</div>
</body>
</html>