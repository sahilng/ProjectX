<!DOCTYPE html>
<html>
<head>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'></script>
<script type="text/javascript" src="schedules.js"></script>
<script type="text/javascript" src="table.js"></script>
<link rel="stylesheet" type="text" href="style.css">
<link rel="stylesheet" type="text" href="overflow.css">
</head>
<body>

<?php
require 'keys.php';
$trimester = "Q3";
$password = $_POST['pw'];
$user = $_POST['uid'];


if($password === "hmlions"){
	
}else{
	header("Location: index.php");
}

$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result = mysqli_query($con,"SELECT * FROM People");

if(mysqli_num_rows($result) == 0){
	header("Location: index.php");
}

$rows = array();
while($row = mysqli_fetch_array($result))
	{
		array_push($rows, $row);
	}
	
mysqli_close($con);

var_dump($rows);

?>


</body>
</html>