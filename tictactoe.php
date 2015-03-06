<?php
/**
 * TicTacToe Object
 *
 * LICENSE:
 *   TicTacToe Program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   TicTacToe Program is distributed in the hope that it will be useful,
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
class tictactoe{
	private $player;		//Current Turn
	private $board;			//Tic Tac Toe board
	private $totalMoves;	//Number of moves made
	private $isDone;
	
	function __construct($player){
		$this->player = $player;
		$this->totalMoves = 0;
		$this->board = array(0,1,2,3,4,5,6,7,8);
		$this->isDone = false;
	}
	
	public function move($cord){
		$this->board[$cord] = $this->player;
		$this->player = ($this->player == "X" ? "O" : "X");
		$this->totalMoves++;
		if ($this->checkGame() != null){
			$this->isDone = true;
		}
	}
	private function checkGame(){
		$possSolutions = array(
			array(0,1,2),array(3,4,5),array(6,7,8),
			array(0,3,6),array(1,4,7),array(2,5,8),
			array(0,4,8),array(2,4,6));
		foreach($possSolutions as $point){
			if ($this->board[$point[0]] == $this->board[$point[1]] && $this->board[$point[1]] == $this->board[$point[2]]){
				return $this->board[$point[0]];
			}
		}
		if ($this->totalMoves >= 9){
			return "Tie";
		}
	}
	public function __toString(){
		if (!$this->isDone){
			echo "<table>";
			for ($x = 0; $x < 9; $x++) {
				if ($x == 3 || $x == 6) {
					echo "</tr>";
				}
				if ($x == 0 || $x == 3) {
					echo "<tr>";
				}
				if (!is_int($this->board[$x])) {
					$img = $this->board[$x];
					echo "<td><img src='img/$img.jpg' alt='$img' title='$img' /></td>";
				} else {
					//It's not? Let them choose this position
					echo "<td><input type='radio' name='cords' value='{$x}'></input></td>";
				}
			}
			return "</table><p><input type='submit' name='move' value='Submit' /><br/>It's player {$this->player}'s turn.</p>";
		} else {
			//Decide if there was a winner or not.
			if ($this->checkGame() != "Tie") {
				echo $this->checkGame() . " has won the match!";
			} elseif ($this->checkGame() == "Tie") {
				echo "TIED MATCH";
			} else {
				echo "Something went wrong....";
			}
			return "<input type='submit' name='newgame' value='New Game' />";
		}
	}
}
?>