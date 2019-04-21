<html lang="en">
<head>
	<title>Custom Validation Rule Laravel 5</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Custom Validation Rule Laravel 5</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<form class="form-horizontal" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="form-control" placeholder="Name">
				@if($errors->has('name'))
					<span class="text-danger"> {{ $errors->first('name') }} </span>
				@endif
			</div>

			<div class="form-group">
				<label>Number:</label>
				<input type="number" name="number" class="form-control" placeholder="Number">
				@if ($errors->has('number'))
					<span class="text-danger"> {{ $errors->first('number') }} </span>
				@endif
			</div>

			<div class="form-group">
				<button class="btn btn-success btn-submit">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>