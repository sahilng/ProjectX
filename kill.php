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

$c_word_query = mysqli_query($con, 'SELECT word from People where id='.$target);
$c_word_array = mysqli_fetch_array($c_word_query);
var_dump($c_word_array);
$c_word = $c_word_array[0];

if(strcmp($word, $c_word) == 0){
			
			//first get target's target (tt)
			$tt_query = mysqli_query($con, 'SELECT target from People where id='.$target);
			$tt_array = mysqli_fetch_array($tt_query);
			$tt = $tt_array[0];
			
			//then set the target's target to 0
			mysqli_query($con, 'UPDATE People SET target=0 where id='.$target);

			//then set killer's target to the tt
			mysqli_query($con, 'UPDATE People SET target='.$tt.' where id='.$killer);
			
			//then set target's alive to no
			mysqli_query($con, 'UPDATE People SET alive=0 where id='.$target);

			//increment killer's kills
			mysqli_query($con, 'UPDATE People SET kills = kills + 1 where id='.$killer);
			
	
	echo "SUCCESS ".$killer." has killed ".$target.".";
}
else{
	echo $word." not equal to ".$c_word;
	echo "<a href=base.php?success=false&user=".$killer.">Go back</a>";
}
mysqli_close($con);
?>

</body>
</html>