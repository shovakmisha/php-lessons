<div class='row navigation'>
	
	<ul id="nav">
		<li class='nav <?php if(isset($n)){if($n==1){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a href='/popov/index.php'>Головна</a>
			</p>
		</li>
		
		<li class='nav <?php if(isset($n)){if($n==2){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a>Категорії</a>
			</p>
			<ul class=''>
			<?php
				$result2 = mysql_query("SELECT * FROM categories",$db);
				if(!$result2){
					echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
					exit(mysql_error());
				}
				
				if(mysql_num_rows($result2) > 0){
					$myrow2 = mysql_fetch_array($result2);
					
					do{
						printf("<li class=''><a href='view_cat.php?cat=%s'>%s</a></li>",$myrow2["id"],$myrow2["title"]);
					}while($myrow2 = mysql_fetch_array($result2));
				}else{
					echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
					exit();
				}
			?>
			</ul>
		</li>
		
		<li class='nav <?php if(isset($n)){if($n==3){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a>Галерея</a>
			</p>
			<ul class=''>
				<li class=''>
					<a href='/popov/fotos.php'>фото</a>
				</li>
				<li class=''>
					<a href='/popov/videos.php'>відео</a>
				</li>
			</ul>
		</li>
		
		<li class='nav <?php if(isset($n)){if($n==4){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a href='/popov/about.php'>Контакти</a>
			</p>
		</li>
	</ul>
	
</div>