<!DOCTYPE html>
<html lang="en">
<head>
  <title>Weather Conditions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Weather Conditions</h1>
  <p>Evan Miller</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <h3>Location</h3>
      <p>

<form action="city.php" method="post">
	<label for="text">City</label>
	<input type="text" class="form-control" name="city"><br>
	<label for="text">State</label>
	<input type="text" class="form-control" name="state"><br>
<button type="submit" class="btn btn-info btn-block">Get Conditions</button>
</form>


</p>
    </div>
    <div class="col-sm-5">
      <h3>Weather</h3>
      <h2>Your results will appear here</h2>
    </div>
  </div>
</div>

</body>
</html>
