<?php
	$output = '';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		// TODO: ?????????, ??? ?? ???? ???????
		$n1 = (int)$_POST['num1'];
		$n2 = (int)$_POST['num2'];
		$op = trim(strip_tags($_POST['operator']));
		$output = "$n1 $op $n2 = ";
		
		switch($op){
			case '+': $output .= $n1 + $n2; break;
			case '-': $output .= $n1 - $n2; break;
			case '-': $output .= $n1 * $n2; break;
			case '/':
				if($n2 === 0){
					$output = "??????? ?? 0 ?????????!";
				}else{
					$output .= $n1 / $n;
				}
				break;
			default: $output = "?????????? ???????? - $op";
		}
	}
	
?>

	<form action='' method='POST'>
		<label>????? 1:</label><br />
		<input name='num1' type='text'/><br />
		<label>????????: </label><br />
		<input name='operator' type='text'/><br />
		<label>????? 2: </label><br />
		<input name='num2' type='text'/><br /><br />
		<input type='submit' value='???????'>
	</form>	
	<?php
		echo $output;	
	?>	