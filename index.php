

<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
</head>
<style type="text/css">
html {
  
  background-image:url('2.jpg');
  background-size:cover;
}

table {
  font-family: Georgia, serif;
    font-size: 30px;
    font-style: normal;
    font-weight: normal;
    letter-spacing: -1px;
    line-height: 1.2em;
    border-collapse:collapse;
    text-align:center;
    width: 60%;
    margin: 0 auto;
}

td {
  padding: 30px;
  font-family: 'Montserrat', sans-serif;
}

tr {
  background:rgba(255, 255, 255, 0.2);
  border-radius: 25px;
  margin-bottom: 30px;
font-family: Arial, Helvetica, sans-serif;
display: inline-block;
font-size: .6em;
}

tr:hover { background:rgba(255, 255, 255, 0.1);}

#city {
  display: grid;
justify-items: center;
}


#weatherTag {
  text-align: center;
  font-family: 'Montserrat', sans-serif;
  font-size: 1.5em;
}

#submit {
  border-radius: 15px;
  font-size: 15px;
  background-color: #5bb069;
  width: 8em;  
  height: 2em;
  border-style: none;
}

#submit:hover {
  background-color: rgba(255, 255, 255, 0.1);
}


</style>
<body>

<html>
<div>
<form id="city" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p><label for="location"><input type="text" id="location" name="location" placeholder="Enter your location" /></label></p>
    <input id="submit" type="submit" value="Submit" name="submit" />
</form>
 </div>

<?php
$url="http://api.openweathermap.org/data/2.5/forecast/daily?q=".$_POST["location"]."&units=metric&cnt=5&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559";
$json=file_get_contents($url);
$data=json_decode($json,true);


echo  " <p id=\"weatherTag\"> The weather in " . $_POST["location"] . " for the next days: </p> ";
echo '<table>';
foreach($data['list'] as $index => $value) {
 
 $day = date('l',$value[dt]);
 echo '<tr>';
  echo  '<td>' . "Max temperature for " . $day . " will be " . $value[temp][max] . "°C" . '</td>' ;
  echo '</tr>';
}

?>


<?php 
/* --- code to make everything cleaner ---
foreach($data['list'] as $index => $value) :?>
<tr>
<td>ef fdsf sdf <?=$day?></td>
</tr>

<?php endforeach;
*/
?> 





</body>
</html>