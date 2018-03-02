<?php 
include ("../lock.php");
include ("../blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница добавления новой заметки</title>
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
						$result = mysql_query("SELECT title,id FROM data");      
						$myrow = mysql_fetch_array($result);
						
						echo "<p class='podskazka'>Выберите заметку, которую вы хотите отредактировать</p>";
						do 
						{
						printf ("<p><a href='edit_post.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
						}

						while ($myrow = mysql_fetch_array($result));
					}else{
						$result = mysql_query("SELECT * FROM data WHERE id=$id");      
						$myrow = mysql_fetch_array($result);

						$result2 = mysql_query("SELECT * FROM categories");
						$myrow2 = mysql_fetch_array($result2);

						echo "<p class='post_title'>Редактирование заметки</p>";
						echo "<form name='form1' method='post' action='update_post.php'><p><label for='sel'>Выберите категорию</label><br><select id='sel' name='cat'>";

						do{
							if($myrow2["id"] == $myrow["cat"]){
								printf("<option value='%s' selected>%s</option>", $myrow2["id"], $myrow2["title"]);
							}else{
								printf("<option value='%s'>%s</option>", $myrow2["id"], $myrow2["title"]);
							}
						}while($myrow2 = mysql_fetch_array($result2));
						echo "</select></p>";
						
						
						echo "	<p>Добавлять в секретный раздел?<br>
							   <label><input type='radio'";
								if($myrow["secret"] == 1){echo "checked";}
						echo "  name='secret' id='secret' value='1'><strong>Да</strong></label>
							   <br>
							   <label>
									<input type='radio'";
									if($myrow["secret"] == 0){echo " checked ";}
						echo	"		name='secret' id='secret' value='0'><strong> Нет</strong>
							   </label>
							 </p>";

						print <<<HERE


								 <p>
								   <label>Введите название заметки<br>
									 <input value="$myrow[title]" type="text" name="title" id="title">
									 </label>
								 </p>
								 <p>
								   <label>Введите краткое описание заметки<br>
								   <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
								   </label>
								 </p>
								 <p>
								   <label>Введите ключевые слова для заметки<br>
								   <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
								   </label>
								 </p>
								 <p>
								   <label>Введите дату добавления заметки<br>
								   <input value="$myrow[date]" name="date" type="text" id="date" value="2007-01-27">
								   </label>
								 </p>
								 <p>
								   <label>Ведите краткое описание заметки с тэгами абзацев<br>
								   <textarea name="description" id="description" cols="40" rows="5">$myrow[description]</textarea>
								   </label>
								 </p>
								 <p>
								   <label>Введите полный текст заметки с тэгами<br>
								   <textarea name="text" id="text" cols="40" rows="10">$myrow[text]</textarea>
								   </label>
								 </p>
								 <p>
								   <label>Введите автора заметки<br>
								   <input value="$myrow[author]" type="text" name="author" id="author">
								   </label>
								 </p>
								 <p>
								   <label>Введите путь к картинке заметки<br>
								   <input value="$myrow[mini_img]" type="text" name="img" id="img">
								   </label>
								 </p>
								 <input name="id" type="hidden" value="$myrow[id]">
								 
								 <p>
								   <label>
								   <input type="submit" name="submit" id="submit" value="Сохранить изменения">
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
