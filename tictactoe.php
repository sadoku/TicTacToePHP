<?php
/**
 * TicTacToe Object
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
class tictactoe{
	private $player;		//Current Turn
	private $board;			//Tic Tac Toe board
	private $totalMoves;	//Number of moves made
	private $isDone;
	
	function __construct($player){
		$this->player = $player;
		$this->totalMoves = 0;
		$this->board = array(array(1,2,3),array(4,5,6),array(7,8,9));
		$this->isDone = false;
	}
	
	public function move($cords){
		$cord = explode("_", $cords);
		$this->board[$cord[0]][$cord[1]] = $this->player;
		$this->player = ($this->player == "X" ? "O" : "X");
		$this->totalMoves++;
		if ($this->checkGame() !== null){
			$this->isDone = true;
		}
	}
	private function checkGame(){
		
		//Across the top X & X ==  X & X 
		if ($this->board[0][0] == $this->board[0][1] && $this->board[0][1] == $this->board[0][2]){
			return $this->board[0][0];
		}	
		//Across the middle
		if ($this->board[1][0] == $this->board[1][1] && $this->board[1][1] == $this->board[1][2]){
			return $this->board[1][0];
		}	
		//Across the bottom
		if ($this->board[2][0] == $this->board[2][1] && $this->board[2][1] == $this->board[2][2]){
			return $this->board[2][0];
		}	
		//Straight Left
		if ($this->board[0][0] == $this->board[1][0] && $this->board[1][0] == $this->board[2][0]){
			return $this->board[0][0];
		}	
		//Straight middle
		if ($this->board[0][1] == $this->board[1][1] && $this->board[1][1] == $this->board[2][1]){
			return $this->board[0][1];
		}	
		//Straight Right
		if ($this->board[0][2] == $this->board[1][2] && $this->board[1][2] == $this->board[2][2]){
			return $this->board[0][2];
		}	
		//Diagonal \
		if ($this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2]){
			return $this->board[0][0];
		}	
		//Diagonal /
		if ($this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0]){
			return $this->board[0][2];
		}
		//Can only make 9 moves, otherwise its a tie.	
		if ($this->totalMoves >= 8){
			return "Tie";
		}	
	}
	public function __toString(){
		//Is the game over?
		if (!$this->isDone){
			echo "<table>";
			
			for ($x = 0; $x < 3; $x++){
				echo "<tr>";
				for ($y = 0; $y < 3; $y++){
					echo "<td>";
					//Is the position taken?
					if(!is_int($this->board[$x][$y])){
						$img = $this->board[$x][$y];
						echo "<img src='img/$img.jpg' alt='$img' title='$img' />";
					}
					else{
						//It's not? Let them choose this position
						echo "<input type='radio' name='cords' value='{$x}_{$y}'></input>";
					}
					
					echo "</td>";
				}
				
				echo "</tr>";
			}
			return "</table><p><input type='submit' name='move' value='Submit' /><br/>It's player {$this->player}'s turn.</p>";
		} else {
			//Decide if there was a winner or not.
			if($this->checkGame() != "Tie"){
				echo $this->checkGame() . " has won the match!";
			} elseif($this->checkGame() == "Tie"){
				echo "TIED MATCH";
			} else {
				echo "Something went wrong....";
			}
			return "<input type='submit' name='newgame' value='New Game' />";
		}
	}
}
?>