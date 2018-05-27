<?php
	include("blocks/db.php");
	if( isset( $_POST['author'] ) ){
		$author = $_POST['author'];
	}
	if( isset( $_POST['text'] ) ){
		$text = $_POST['text'];
	}
	if( isset( $_POST['pr'] ) ){
		$pr = $_POST['pr'];
	}
	if( isset( $_POST['sub_com'] ) ){
		$sub_com = $_POST['sub_com'];
	}
	if( isset( $_POST['id'] ) ){
		$id = $_POST['id'];
	}
	
	if(isset($sub_com)){
		
		if(isset($author)){trim($author);}
		else{$author = '';}
		
		if(isset($text)){trim($text);}
		else{$text = '';}
		
		if(empty($author) or empty($text)){
			exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля. <br> <input name='back' type='button' value='Вернуться назад' onclick='javascript:history.back();'></p>");
		}
	}
	$author = stripcslashes($author); $text = stripcslashes($text);
	$author = htmlspecialchars($author); $text = htmlspecialchars($text);
	
	$result = mysql_query("SELECT sum FROM comments_setting",$db);
	$myrow = mysql_fetch_array($result);
	if($pr == $myrow["sum"]){
		$date = date("Y-m-d");
		$result2 = mysql_query("INSERT INTO comments (post,author,text,date) VALUES ('$id','$author', '$text', '$date')",$db);
		
		$address = "shovakmisha93@mail.ru";
		$subject = "Новый коментарий в блоге";
		$result3 = mysql_query("SELECT title FROM data WHERE id='$id'",$db);
		$myrow3 = mysql_fetch_array($result3);
		$post_title = $myrow3["title"];
		
		$message = "Появился коментарий к заметке - ".$post_title."\n Коментарий добавил(а): ".$author."\n Текст коментария: ".$text."\n Ссылка на заметку: http://localhost/phpblog/view.php?id=".$id."";
		mail($address,$subject,$message, "Content-type:text/plain; Charset=windows-1251\r\n");
		echo "<html><head><meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'></head></html>";
		exit();
		
	}else{
		exit("<p>Вы ввели неверную сумму цифр с картинки, вернитесь назад и заполните все поля. <br> <input name='back' type='button' value='Вернуться назад' onclick='javascript:history.back();'></p>");
	}
?>
<!doctype html>

<html>
<head>
	<title>Главная страница блога</title>
	<meta charset="utf-8">
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

	<div class='container photoshop'>
		
	</div>

</body>
</html>
