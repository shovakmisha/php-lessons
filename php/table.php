<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$cols = abs((int)$_POST['cols']);
		$rows = abs((int)$_POST['rows']);
		$color = trim(strip_tags($_POST['color']));
	
		$cols = ($cols) ? $cols : 10;
		$rows = ($rows) ? $rows : 10;
		$color = ($color) ? $color : "gray";
		
		
	}
?>
	<form action='<?php echo $_SERVER['REQUEST_URI'] ?>' method='POST'>
		<label>���������� �������: </label><br />
		<input name='cols' type='text' value="" /><br />
		<label>���������� �����: </label><br />
		<input name='rows' type='text' value="" /><br />
		<label>����: </label><br />
		<input name='color' type='text' value="" /><br /><br />
		<input type='submit' value='�������' />
	</form>

		<?php
			
			@drawTable($cols, $rows, $color);
		?>
			