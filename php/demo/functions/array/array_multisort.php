<HTML>
<HEAD>
<TITLE>array_multisort</TITLE>
</HEAD>
<BODY>
<?
	//create data
	$color = array("green", "green", "blue", "white", "white");	
	$item = array("dish soap", "hand soap", "dish soap", "towel", "towel");
	$dept = array("kitchen", "bathroom", "kitchen", "kitchen", "bathroom");
	$price = array(2.50, 2.25, 2.55, 1.75, 3.00);
	
	//sort by department, item name, color, price
	array_multisort($dept, SORT_ASC, 
		$item, SORT_ASC, 
		$color, SORT_ASC,
		$price, SORT_DESC);
	
	//print sorted list
	for($i=0; $i < count($item); $i++)
	{
		print("$dept[$i] $item[$i] $color[$i] $price[$i]<BR>\n");
	}
?>
</BODY>
</HTML>