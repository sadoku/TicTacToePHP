<?php
require_once('tictactoe.php');
session_start();
if(isset($_POST['newgame'])){
    $_SESSION = array();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
if(isset($_POST['submit'])){
	if(isset($_POST['player'])){
		$game = new tictactoe($_POST['player']);
		$_SESSION['game'] = serialize($game);
		header("Location: index.php"); /* Redirect browser */
		exit();
	} else {
		header("Location: index.php"); /* Redirect browser */
		exit();
	}
    //echo $game;
}
if(isset($_SESSION['game'])){
    $game = unserialize($_SESSION['game']);
    if(isset($_POST['cords'])){
        $cords = $_POST['cords'];
        $game->move($cords);
    }
    $_SESSION['game'] = serialize($game);
    header("Location: index.php");
    exit();
}


?>
