<?php 
	include("blocks/db.php");
	
	if( isset( $_GET['cat'] ) ){
		$cat = $_GET['cat'];
	}
	if( !isset( $_GET['cat'] ) ){
		$cat = 1;
	}
	
	if(!preg_match("|^[\d]+$|", $cat)){
		exit("<p>Неверный формат запроса! Проверьте URL!</p>");
	}
	
	$result = mysql_query("SELECT * FROM categories WHERE id='$cat' ",$db);
	if(!$result){
		echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
		exit(mysql_error());
	}
	
	if(mysql_num_rows($result) > 0){
		$myrow = mysql_fetch_array($result);
	}else{
		echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
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
// Извлекаем из URL текущую страницу
@$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result00 = mysql_query("SELECT COUNT(*) FROM data WHERE cat='$cat' AND secret=0");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// Находим общее число страниц
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start		
		
					$result = mysql_query("SELECT id,title,description,date,author,mini_img,view,rating,q_vote FROM data WHERE cat='$cat' AND secret=0 ORDER BY id LIMIT $start, $num",$db);
					if(!$result){
						echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
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
									<p class='post__adds'>Дата создания: %s</p>
									<p class='post__adds'>Автор урока: %s</p>
								</div>	
									<p>%s</p>
									<p class='view'>Просмотров: %s &nbsp; &nbsp; Рейтинг: <img src='img/%s.gif'></p>
							</div>
							",  $myrow['mini_img'], $myrow['id'], $myrow['title'],$myrow['date'], $myrow['author'], $myrow['description'], $myrow['view'], $r);
						}while( $myrow = mysql_fetch_array($result) );
					
				// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=view_cat.php?cat='.$cat.'&page=1>Первая</a> | <a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>Следующая</a> | <a href=view_cat.php?cat='.$cat.'&page=' .$total. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
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

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
} 
					
					}else{
						echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
						exit();
					}			
				?>
			</div>
		</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
