<html>
<head>
<title>Kill</title>
</head>
<body>

<?php
require('keys.php');

function kill($killer_id, $target_id){
	$conn=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);
	
	//first get target's target
	$tt_query = mysqli_query($conn,'SELECT target from People where id='.$target_id);
	$tt_array = mysqli_fetch_array($tt_query);
	var_dump($tt_array);
	$targets_target = $tt_array[0];
	
	
	//then set the target's target to 0
	mysqli_query($conn, 'UPDATE People SET target=0 where id='.$target_id);
	echo "<br>target's target set to zero<br>";
	//then set the killer's target to the target's old target
	mysqli_query($conn, 'UPDATE People SET target='.$targets_target.' where id='.$killer_id);
	echo "killer's target set to ".$targets_target."<br>";
	//then set target's alive to no
	mysqli_query($conn, 'UPDATE People SET alive=0 where id='.$target_id);
	echo "target set to dead<br>";
	//then increment killer's kills
	mysqli_query($conn, 'UPDATE People SET kills = kills + 1 where id='.$killer_id);
	echo "killer's kills incremented<br>";
	mysqli_close($conn);
}

$killer = $_GET["killer"];
$target = $_GET["target"];
$word = $_GET["word"];

$word = strtolower($word);

$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);

$c_word_query = mysqli_query($con, 'SELECT word from People where id='.$target);
$c_word_array = mysqli_fetch_array($c_word_query);
var_dump($c_word_array);
$c_word = $c_word_array[0];

if(strcmp($word, $c_word) == 0){
	kill($killer, $target);
	echo "SUCCESS ".$killer." has killed ".$target;
}
else{
	echo $word." not equal to ".$c_word;
}
mysqli_close($con);
?>

</body>
</html>