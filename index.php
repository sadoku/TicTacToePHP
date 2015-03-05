<?php
/**
 * Main Page
 *
 * LICENSE:
 *   TicTacToePHP Program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   TicTacToePHP Program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author     Derek Richard
 * @author     Carson Buchanan
 * @copyright  2015-2016
 * @license    http://www.gnu.org/licenses/  GNU GPL V3.0
 * @version    1.0
 */
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