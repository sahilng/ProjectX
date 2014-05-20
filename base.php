<!DOCTYPE html>
<html>
<head>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'></script>

<link rel="stylesheet" type="text" href="css/bootstrap.css">
<link rel="stylesheet" type="text" href="css/style.css">

</head>
<body>

<div id="content">
		<span id="logo">Project X</span>
		
		
		<div id='content' style='margin-top:55px;'>
		
		<?php
		
		function parseName($colonName){
			$nameArray = explode("; ", $colonName);
			return $nameArray[1] . " " . $nameArray[0];
		}
		
		
		
		
		require 'keys.php';
		
		
		$trimester = "Q3";
		
		
		
		$con=mysqli_connect($mysql_server,$mysql_user,$mysql_password,$mysql_db);
		
		
		if(isset($_GET["success"])){
			if(strcmp($_GET["success"], "false") == 0){
				echo "You failed to kill your target: Incorrect word.<br>";
			}
		}
		if(isset($_GET["user"])){
			$user_id = $_GET["user"];
			$u_query = mysqli_query($con,'SELECT unique_id from Players where id='.$user_id);
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
		  
		$result = mysqli_query($con,"SELECT * FROM Players WHERE unique_id=".$user);
		
		if(mysqli_num_rows($result) == 0){
			//header("Location: index.php");
			echo "Login Error.";
		}
		
		$rows = mysqli_fetch_array($result);
		
		$name_query = mysqli_query($con, "SELECT name FROM People WHERE unique_id=(SELECT unique_id from Players where id=".$rows["id"].")");
		$name_array = mysqli_fetch_array($name_query);
		$name = $name_array[0];
		
		
		$t_name_query = mysqli_query($con,"SELECT name FROM People WHERE unique_id=(SELECT unique_id from Players where id=".$rows["target"].")");
		$t_name_array = mysqli_fetch_array($t_name_query);
		$t_name = $t_name_array[0];
		
			
		mysqli_close($con);
		
		echo "Welcome to Project X ".parseName($name);
		echo "<br>";
		
		if(strcmp($rows["alive"], "TRUE") == 0){
			echo "You are alive and playing.";
			echo "<br>You have ".$rows["kills"]." kills.";
			echo "<br>";
			echo "Your target is ".parseName($t_name);
			echo "<br>Give this word to your killer, if you are assassinated: ".$rows["word"];

			echo "<br><br>After successfully assassinating your target, enter their secret word below.<br>";
		
		
		
			echo "
			<form method=get action=kill.php>
			<input type=text style='display:none;' name='killer' value=".$rows["id"].">
			<input type=text style='display:none;' name='target' value=".$rows["target"].">
			Target's secret Word: <input type=text name='word'>
			<input type=submit>
			</form>
			";
		}
		else{
			echo "Sorry, you died. Better luck next time.";
		}
		
		?>
		</div>
</div>

</body>
</html>