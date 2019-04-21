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
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li> {{ $error }} </li>
						@endforeach
					</ul>
				</div>
			@endif
			<input type="text" name="title" class="form-control"  placeholder="Add Even Number" />
			<br/>
			<button class="btn btn-primary">Save</button>
		</form>
	</div>
</body>
</html>