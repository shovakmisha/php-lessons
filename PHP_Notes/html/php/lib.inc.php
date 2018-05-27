<?php
	function drawTable($rows, $cols, $color){
		echo "<table border='1'>";
			 for($i = 1; $i <= $rows; $i++){
				echo "<tr>";
				for($j = 1; $j <= $cols; $j++){
					echo "<td style='background: $color'>";
					echo $j*$i;
					echo "</td>";
				}
				echo "</tr>";
			}
		echo "</table>";
	}

?>
