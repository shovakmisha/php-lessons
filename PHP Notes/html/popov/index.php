

<?php 
	include("blocks/db.php");
	$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='index'",$db);
	if(!$result){
		echo "<p>������ �� ������� �� ���� �� ������. �������� �� ���� �������������� admin@mail.ru<br>��� ������: </p>";
		exit(mysql_error());
	}
	
	if(mysql_num_rows($result) > 0){
		$myrow = mysql_fetch_array($result);
	}else{
		echo "<p>���������� �� ������� �� ����� ���� ���������, � ������� ��� ����� �������</p>";
		exit();
	}
?>

<!doctype html>

<html>
<head>
	<title><?php echo $myrow["title"]; ?></title>
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>">
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>">
	<meta charset="windows-1251">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	
	<link rel="stylesheet" href="css/md-1200.css">
	<link rel="stylesheet" href="css/sm-992.css">
	<link rel="stylesheet" href="css/xs-768.css">
	<link rel="stylesheet" href="css/media-480.css">
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/custom.js" type="text/javascript"></script>
	
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<!-- bxSlider Javascript file -->
	<script src="js/jquery.bxslider.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.bxslider').bxSlider();
		});
	</script>
	
</head>
<body>

	<div class='container'>
		<?php include("blocks/header.php") ?>
			<div class='row'>
				<?php include("blocks/left.php") ?>
				<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
					<?php $n=1; include("blocks/nav.php") ?>
					<div class="ik">
						<img src='img/ik.png'>
					</div>
					<!-------------------------------------- ������� --------------------------------------->
					
					<ul class="bxslider">
						<?php 
							$result2 = mysql_query("SELECT road FROM slider",$db);
							if(!$result2){
								echo "<p>������ �� ������� �� ���� �� ������. �������� �� ���� �������������� admin@mail.ru<br>��� ������: </p>";
								exit(mysql_error());
							}
							
							if(mysql_num_rows($result2) > 0){
								$myrow2 = mysql_fetch_array($result2);
								do{
									printf("<li><img src='%s'/></li>",$myrow2["road"]);
								}while($myrow2 = mysql_fetch_array($result2));
							}else{
								echo "<p>���������� �� ������� �� ����� ���� ���������, � ������� ��� ����� �������</p>";
								exit();
							}
						?>
						<!-- <li><img src="slider/1.jpg" title="���� 1"/></li>
						<li><img src="slider/2.jpg" title="���� 2"/></li>
						<li><img src="slider/3.jpg" title="���� 3"/></li> -->
					</ul>
					<?php echo $myrow["text"]; ?>
				</div>
			</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
