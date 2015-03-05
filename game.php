<?php
/**
 * Game Handler
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

//New Game
if(isset($_POST['newgame'])){
	$_SESSION = array(); 
	session_unset();
	session_destroy();
	header("Location: index.php"); 
	exit();
}

//Start a new game
if(isset($_POST['submit'])){
	$game = new tictactoe($_POST['player']);
	$_SESSION['game'] = serialize($game);
	header("Location: index.php"); /* Redirect browser */
	exit();
	//echo $game;
}

//Process Turn
if(isset($_SESSION['game'])){
	$game = unserialize($_SESSION['game']);
	if(isset($_POST['move']) && isset($_POST['cords'])){
		$cords = $_POST['cords'];
		$game->move($cords);
	}
	$_SESSION['game'] = serialize($game);
	header("Location: index.php"); 
	exit();
}


?>