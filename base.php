<!DOCTYPE html>
<html>
<head>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'></script>
<script type="text/javascript" src="schedules.js"></script>
<script type="text/javascript" src="table.js"></script>
<link rel="stylesheet" type="text" href="style.css">
<link rel="stylesheet" type="text" href="overflow.css">


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
  
$result = mysqli_query($con,"SELECT * FROM base14 WHERE (term='Q 3' or term='ALL') and unique_id=" . $user);

if(mysqli_num_rows($result) == 0){
	header("Location: index.php");
}

?>

<title>Schedules - Your Schedule</title>
</head>
<body>
<div id="header">
	
	<div id="logo"><a href="index.php">Schedules</a></div>
	
</div>
<div id="tablebody">
<table>
<thead><th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th scope="col">Day 1</th><th scope="col">Day 2</th><th scope="col">Day 3</th><th scope="col">Day 4</th><th scope="col">Day 5</th><th scope="col">Day 6</th><th scope="col">Day 7</th><th scope="col">Day 8</th><th scope="col">Day 9</th><th scope="col">Day 10</th></thead>
<tr><th scope="col">A</th><td id="A1">FREE</td><td id="A2">FREE</td><td id="A3">FREE</td><td id="A4">FREE</td><td id="A5">FREE</td><td id="A6">FREE</td><td id="A7">FREE</td><td id="A8">FREE</td><td id="A9">FREE</td><td id="A0">FREE</td></tr>
<tr><th scope="col">B</th><td id="B1">FREE</td><td id="B2">FREE</td><td id="B3">FREE</td><td id="B4">FREE</td><td id="B5">FREE</td><td id="B6">FREE</td><td id="B7">FREE</td><td id="B8">FREE</td><td id="B9">FREE</td><td id="B0">FREE</td></tr>
<tr><th scope="col">C</th><td id="C1">FREE</td><td id="C2">ASSEMBLY</td><td id="C3">FREE</td><td id="C4">FREE</td><td id="C5">FREE</td><td id="C6">FREE</td><td id="C7">ADVISORY</td><td id="C8">FREE</td><td id="C9">FREE</td><td id="C0">FREE</td></tr>
<tr><th scope="col">D</th><tD id="D1">FREE</td><td id="D2">FREE</td><td id="D3">FREE</td><td id="D4">FREE</td><td id="D5">FREE</td><td id="D6">FREE</td><td id="D7">FREE</td><td id="D8">FREE</td><td id="D9">FREE</td><td id="D0">FREE</td></tr>
<tr><th scope="col">E</th><td id="E1">FREE</td><td id="E2">FREE</td><td id="E3">FREE</td><td id="E4">FREE</td><td id="E5">FREE</td><td id="E6">FREE</td><td id="E7">FREE</td><td id="E8">FREE</td><td id="E9">FREE</td><td id="E0">FREE</td></tr>
<tr><th scope="col">F</th><td id="F1">FREE</td><td id="F2">FREE</td><td id="F3">FREE</td><td id="F4">FREE</td><td id="F5">FREE</td><td id="F6">FREE</td><td id="F7">FREE</td><td id="F8">FREE</td><td id="F9">FREE</td><td id="F0">FREE</td></tr>
<tr><th scope="col">G</th><td id="G1">FREE</td><td id="G2">FREE</td><td id="G3">FREE</td><td id="G4">FREE</td><td id="G5">FREE</td><td id="G6">FREE</td><td id="G7">FREE</td><td id="G8">FREE</td><td id="G9">FREE</td><td id="G0">FREE</td></tr>
<tr><th scope="col">H</th><td id="H1">FREE</td><td id="H2">FREE</td><td id="H3">FREE</td><td id="H4">FREE</td><td id="H5">FREE</td><td id="H6">FREE</td><td id="H7">FREE</td><td id="H8">FREE</td><td id="H9">FREE</td><td id="H0">FREE</td></tr>
</table>

<br>
<br>
<br>

<form id="freematefinder" action='freemates.php' method=post>
<input id="free_field" type=text name='free' style="visibility: hidden;display:none;">
<input type=submit style="visibility: hidden;display:none;">
</form>

<?php
$rows = array();
while($row = mysqli_fetch_array($result))
	{
		array_push($rows, $row);
	}
	
mysqli_close($con);

?>

<script type="text/javascript">
	fillTable(<?php echo json_encode($rows); ?>);
</script>
</div>
</body>
</html>