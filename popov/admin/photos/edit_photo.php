<?php 
include ("../lock.php");
include ("../blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������� ���������� ����� ��������</title>
<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.css">
	
	<link rel="stylesheet" href="../css/md-1200.css">
	<link rel="stylesheet" href="../css/sm-992.css">
	<link rel="stylesheet" href="../css/xs-768.css">
	<link rel="stylesheet" href="../css/media-480.css">	
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/bootstrap.js" type="text/javascript"></script>
	<script src="../js/custom.js" type="text/javascript"></script>
</head>
<body>
	<div class='container'>
		<?php include("../blocks/header_2.php");   ?> 
		<div class='row'>
			<?php include("../blocks/lefttd.php") ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<div class="ik">
					<img src='../img/ik.png'>
				</div>
				
				<div class='forma'>
					<?php 
					if (!isset($id)){
						$result = mysql_query("SELECT title,id,mini FROM fotos");      
						$myrow = mysql_fetch_array($result);
						
						echo "<p class='podskazka'>�������� ��������, ������� �� ������ ���������������</p>";
						do{
							printf ("<div><a href='edit_photo.php?id=%s' style='display:block;'><img src='../../%s' style='width: 30px; margin: 10px;' > %s</a></div>",$myrow["id"],$myrow["mini"],$myrow["title"]);
						}while ($myrow = mysql_fetch_array($result));
					}else{
						$result = mysql_query("SELECT * FROM fotos WHERE id=$id");      
						$myrow = mysql_fetch_array($result);

						echo "<p class='post_title'>�������������� ��������</p>";

						print <<<HERE

								<form name='form1' method='post' action='update_photo.php'>
									 <p>
									   <label>������� �������� ��������<br>
										 <input value="$myrow[title]" type="text" name="title" id="title">
										 </label>
									 </p>
								
									 <p>
									   <label>������� ���� � ��������� ��������<br>
									   <input value="$myrow[mini]" type="text" name="mini" id="img">
									   </label>
									 </p>
									 <p>
									   <label>������� ���� � ��������<br>
									   <input value="$myrow[full]" type="text" name="full" id="img">
									   </label>
									 </p>
									 <input name="id" type="hidden" value="$myrow[id]">
									 
									 <p>
									   <label>
									   <input type="submit" name="submit" id="submit" value="��������� ���������">
									   </label>
									 </p>
							   </form>
HERE;
					}
					?>
				</div>
			</div>
		</div>	
		<?php  include ("../blocks/footer.php");        ?> 
	</div>	
</table>
</body>
</html>
