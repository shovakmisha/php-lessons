<div class='row navigation'>
	
	<ul id="nav">
		<li class='nav <?php if(isset($n)){if($n==1){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a href='/popov/index.php'>�������</a>
			</p>
		</li>
		
		<li class='nav <?php if(isset($n)){if($n==2){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a>�������</a>
			</p>
			<ul class=''>
			<?php
				$result2 = mysql_query("SELECT * FROM categories",$db);
				if(!$result2){
					echo "<p>������ �� ������� �� ���� �� ������. �������� �� ���� �������������� admin@mail.ru<br>��� ������: </p>";
					exit(mysql_error());
				}
				
				if(mysql_num_rows($result2) > 0){
					$myrow2 = mysql_fetch_array($result2);
					
					do{
						printf("<li class=''><a href='view_cat.php?cat=%s'>%s</a></li>",$myrow2["id"],$myrow2["title"]);
					}while($myrow2 = mysql_fetch_array($result2));
				}else{
					echo "<p>���������� �� ������� �� ����� ���� ���������, � ������� ��� ����� �������</p>";
					exit();
				}
			?>
			</ul>
		</li>
		
		<li class='nav <?php if(isset($n)){if($n==3){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a>�������</a>
			</p>
			<ul class=''>
				<li class=''>
					<a href='/popov/fotos.php'>����</a>
				</li>
				<li class=''>
					<a href='/popov/videos.php'>����</a>
				</li>
			</ul>
		</li>
		
		<li class='nav <?php if(isset($n)){if($n==4){echo 'active';}}?> col-lg-3 col-md-3 col-sm-3 col-xs-12'>
			<p class='glavnaya'>
				<a href='/popov/about.php'>��������</a>
			</p>
		</li>
	</ul>
	
</div>