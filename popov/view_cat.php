<?php 
	include("blocks/db.php");
	
	if( isset( $_GET['cat'] ) ){
		$cat = $_GET['cat'];
	}
	if( !isset( $_GET['cat'] ) ){
		$cat = 1;
	}
	
	if(!preg_match("|^[\d]+$|", $cat)){
		exit("<p>�������� ������ �������! ��������� URL!</p>");
	}
	
	$result = mysql_query("SELECT * FROM categories WHERE id='$cat' ",$db);
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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title><?php echo $myrow["title"]; ?></title>
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>">
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>">
	
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
	
</head>
<body>

	<div class='container'>
		<?php include("blocks/header.php") ?>
		<div class='row'>
			<?php include("blocks/left.php") ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<?php include("blocks/nav.php") ?>
				<div class="ik">
					<img src='img/ik.png'>
				</div>
				<?php echo $myrow["text"]; 
				
$result77 = mysql_query("SELECT str FROM options", $db);
$myrow77 = mysql_fetch_array($result77);
$num = $myrow77["str"];
// ��������� �� URL ������� ��������
@$page = $_GET['page'];
// ���������� ����� ����� ��������� � ���� ������
$result00 = mysql_query("SELECT COUNT(*) FROM data WHERE cat='$cat' AND secret=0");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// ������� ����� ����� �������
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// ���������� ������ ��������� ��� ������� ��������
$page = intval($page);
// ���� �������� $page ������ ������� ��� ������������
// ��������� �� ������ ��������
// � ���� ������� �������, �� ��������� �� ���������
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// ��������� ������� � ������ ������
// ������� �������� ���������
$start = $page * $num - $num;
// �������� $num ��������� ������� � ������ $start		
		
					$result = mysql_query("SELECT id,title,description,date,author,mini_img,view,rating,q_vote FROM data WHERE cat='$cat' AND secret=0 ORDER BY id LIMIT $start, $num",$db);
					if(!$result){
						echo "<p>������ �� ������� �� ���� �� ������. �������� �� ���� �������������� admin@mail.ru<br>��� ������: </p>";
						exit(mysql_error());
					}
					
					if(mysql_num_rows($result) > 0){
						$myrow = mysql_fetch_array($result);
						
						do{
						$r = $myrow['rating'] / $myrow['q_vote'];
						$r = intval($r);
						printf("
							<div class='post__stati'>
								<div class='top__stati'>
									<p class='post__title'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
									<p class='post__adds'>���� ��������: %s</p>
									<p class='post__adds'>����� �����: %s</p>
								</div>	
									<p>%s</p>
									<p class='view'>����������: %s &nbsp; &nbsp; �������: <img src='img/%s.gif'></p>
							</div>
							",  $myrow['mini_img'], $myrow['id'], $myrow['title'],$myrow['date'], $myrow['author'], $myrow['description'], $myrow['view'], $r);
						}while( $myrow = mysql_fetch_array($result) );
					
				// ��������� ����� �� ������� �����
if ($page != 1) $pervpage = '<a href=view_cat.php?cat='.$cat.'&page=1>������</a> | <a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>����������</a> | ';
// ��������� ����� �� ������� ������
if ($page != $total) $nextpage = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>���������</a> | <a href=view_cat.php?cat='.$cat.'&page=' .$total. '>���������</a>';

// ������� ��� ��������� ������� � ����� �����, ���� ��� ����
if($page - 5 > 0) $page5left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// ����� ���� ���� ������� ������ �����

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
} 
					
					}else{
						echo "<p>���������� �� ������� �� ����� ���� ���������, � ������� ��� ����� �������</p>";
						exit();
					}			
				?>
			</div>
		</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
