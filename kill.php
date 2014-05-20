<html>
<head>
<title>Kill</title>
<link rel="stylesheet" type="text" href="css/bootstrap.css">
<link rel="stylesheet" type="text" href="css/style.css">

</head>
<body>

<div id='content' style='margin-top:55px;'>

<span id="logo">Project X</span>
<br>

<?php
require('keys.php');


$killer = $_GET["killer"];
$target = $_GET["target"];
$word = $_GET["word"];

$word = strtolower($word);

$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);

$c_word_query = mysqli_query($con, 'SELECT word from Players where id='.$target);
$c_word_array = mysqli_fetch_array($c_word_query);
$c_word = $c_word_array[0];

if(strcmp($word, $c_word) == 0){
			
			//first get target's target (tt)
			$tt_query = mysqli_query($con, 'SELECT target from Players where id='.$target);
			$tt_array = mysqli_fetch_array($tt_query);
			$tt = $tt_array[0];
			
			//then set the target's target to 0
			mysqli_query($con, 'UPDATE Players SET target=0 where id='.$target);

			//then set killer's target to the tt
			mysqli_query($con, 'UPDATE Players SET target='.$tt.' where id='.$killer);
			
			//then set target's alive to no
			mysqli_query($con, 'UPDATE Players SET alive=false where id='.$target);

			//increment killer's kills
			mysqli_query($con, 'UPDATE Players SET kills = kills + 1 where id='.$killer);
			
	
	echo "Success. You have killed your target";
}
else{
	echo "Failure. You entered the wrong word.";
	echo "<a href=base.php?success=false&user=".$killer.">Go back</a>";
}
mysqli_close($con);
?>

</div>

</body>
</html>