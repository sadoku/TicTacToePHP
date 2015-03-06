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
        <h1>Tic Tac Toe</h1>
        <?php
        if(isset($_SESSION['game'])){
            echo unserialize($_SESSION['game']);
        } else {
        ?>
        <div class="table">
        <h3>Choose which player goes first</h3>
        <table>
        <tr><td><input type="radio" name="player" value="X" id="x" />
        <label for="x"><img src="img/X.jpg" /></label></td>
        <td><input type="radio" name="player" value="O" id="o" />
        <label for="o"><img src="img/O.jpg" /></label></td></tr>

        <tr><td colspan="2"><input type="submit" value="submit" name="submit" /></td></tr>
        </table>
        </div>
    </form>
    <?php } ?>
</div>
</body>
</html>
