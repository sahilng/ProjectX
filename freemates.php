<html>
<head>
<title>Schedules - FreeMates</title>
<link rel="stylesheet" type="text" href="style.css">
</head>
<body>
<div id="header">
	
	<div id="logo"><a href="index.php">Schedules</a></div>
	
</div>
<div id="freemates">
<?php
require 'keys.php';
function printName($name){
	
	$array = split("; ", $name);
	echo $array[1] . " " . $array[0];
	
	
}

$free = $_POST['free'];

echo "<h1>These people have " . $free . " free:</h1>";

$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result = mysqli_query($con,"SELECT name from meeting_times where time3 NOT LIKE '%" . $free . "%'");

$rows = array();
while($row = mysqli_fetch_array($result))
	{
		printName($row[0]);
		echo "<br>";
	}
	
mysqli_close($con);


?>
</div>
</body>
</html>