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



$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);


if(isset($_GET["success"])){
	if(strcmp($_GET["success"], "false") == 0){
		echo "You failed to kill your target: Incorrect word.<br>";
	}
	$user_id = $_GET["user"];
	$u_query = mysqli_query($con,'SELECT unique_id from People where id='.$user_id);
	$u_array = mysqli_fetch_array($u_query);
	$user = $u_array[0];
}
else{
	$user = $_POST['uid'];
}


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result = mysqli_query($con,"SELECT * FROM People WHERE unique_id=".$user);

if(mysqli_num_rows($result) == 0){
	//header("Location: index.php");
	echo "Login Error.";
}

/*
$rows = array();
while($row = mysqli_fetch_array($result))
	{
		array_push($rows, $row);
	}
*/

$rows = mysqli_fetch_array($result);

$t_name_query = mysqli_query($con,"SELECT name FROM People WHERE id=".$rows["target"]);
$t_name_array = mysqli_fetch_array($t_name_query);
$t_name = $t_name_array[0];
	
mysqli_close($con);

echo "id=".$rows["id"];
echo "<br>";
echo "unique id=".$rows["unique_id"];
echo "<br>";
echo "name=".$rows["name"];
echo "<br>";
echo "alive=".$rows["alive"];
echo "<br>";
echo "target=".$rows["target"];
echo "<br>";
echo "target name=".$t_name;
echo "<br>";
echo "word=".$rows["word"];


echo"
<form method=get action=kill.php>
<input type=text name='killer' value=".$rows["id"].">
<input type=text name='target' value=".$rows["target"].">
<input type=text name='word'>
<input type=submit>
</form>
"
?>

</body>
</html>