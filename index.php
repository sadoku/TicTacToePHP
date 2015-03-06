<?php
require_once('tictactoe.php');
session_start();
?>
<html>
	<head>
		<title>Tic-Tac-Toe</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="main">
		<form action="game.php" method="POST">
		<h2>Tic Tac Toe</h2>
		<?php
		if(isset($_SESSION['game'])){
			echo unserialize($_SESSION['game']);
		} else {
		?>
		 <select name="player">
		  <option value="X">X</option>
		  <option value="O">O</option>
		</select>
		<input type="submit" value="submit" name="submit"></input>
		</form>
		<?php } ?>
		</div>
	</body>
</html>