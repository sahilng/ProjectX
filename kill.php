<html>
<head>
<title>Kill</title>


</head>
<body>


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

$target_alive_query = mysqli_query($con, 'SELECT alive from Players where id='.$target);
$target_alive_array = mysqli_fetch_array($target_alive_query);
$target_alive = $target_alive_array[0];

if(strcmp($word, $c_word) == 0 && strcmp($target_alive, "TRUE") == 0){
			
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
			
	
	header("Location: base.php?user=".$killer);

}
else{
	header("Location: base.php?success=false&user=".$killer);
}
mysqli_close($con);
?>


</body>
</html>