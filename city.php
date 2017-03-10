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
    <div class="col-sm-4">
      <h3>Location</h3>
      <p>

<?php $city = $_POST["city"]; ?><br>
<?php $state = $_POST["state"]; ?><br>
<?php echo "You entered $city, $state"; ?>

<div class="alert alert-success">
  <strong>Success!</strong>
</div>

<?php

$space = " \n";
include_once 'wukey.php';
$key = $wuKey;

$query = "http://api.wunderground.com/api/$key/geolookup/conditions/q/$state/$city.json";

$json_string = file_get_contents($query);
$weatherObject = json_decode($json_string);
	$temperature_string = $weatherObject->{'current_observation'}->{'temperature_string'};
	$display_location = $weatherObject->{'current_observation'}->{'display_location'}->{'full'};
	$display_location_zip = $weatherObject->{'current_observation'}->{'display_location'}->{'zip'};
	$weather_conditions = $weatherObject->{'current_observation'}->{'weather'};
	$wind = $weatherObject->{'current_observation'}->{'wind_string'};
	$precipitation_today = $weatherObject->{'current_observation'}->{'precip_today_string'};
	$forecast_url = $weatherObject->{'current_observation'}->{'forecast_url'};
	$observ_loc_full = $weatherObject->{'current_observation'}->{'observation_location'}->{'full'};
	$observ_time = $weatherObject->{'current_observation'}->{'observation_time'};
?>
</p>
    </div>
    <div class="col-sm-8">
      <h3>Weather</h3>
      <p>
<?php

$weather = "Weather Conditions in $display_location $display_location_zip\n";
$condition = "Conditions: $weather_conditions\n";
$temp = "Temperature: $temperature_string\n";
$windpow = "Wind: $wind\n";
$precip = "Precipitation Today: $precipitation_today\n";
$forecast = "Forecast: $forecast_url\n";
$observ = "Observation Location: $observ_loc_full ('$observ_time')\n";

$output=array($weather, $condition, $temp, $windpow, $precip, $forecast, $observ);

if( count( $output) > 0) {
    echo '<ul>';
    echo '<li>' . implode( '</li><li class="list-group-item">', $output) . '</li>';
    echo '</ul>';
}

?>
<h1>Data is provided by Weather Underground</h1>
<p><a href="https://www.wunderground.com/" class="btn btn-info" role="button">Click here to visit Weather Underground</a></p>
<img src="wulogo.png" class="img-responsive" alt="WU Logo" width="304" height="236">
</div>
</body>
</html>