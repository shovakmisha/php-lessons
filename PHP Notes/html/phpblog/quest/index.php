<?php // WR-guest v 1.7M //  07.01.07 �.  //  Miha-ingener@yandex.ru

error_reporting (E_ALL);

$mainpage="http://���_����_RU-��������_�_index.php_��_5-��_�������";

include "config.php";

$shapka="<html><head><META content='text/html; charset=windows-1251' http-equiv=Content-Type><link rel=stylesheet type='text/css' href='images/$skin/style.css'></head><body>";

// ���� �������
$rand_zag=array(
"����� ���, �� ��� ��� ����. ��� ��� ���������, ��� ���� ���������.",
"����� ������� �� ����� �����. ��� ��� �������� - ���� ��� ����������.",
"��� ������ ����� �����? � �� ������ ����� �����?",
"���� ������� ������, ���������� ��� �������?",
"��������� �� ���� �������, �� ������� ����� �� ���� �����",
"��� ������� ��� �����: ����� �����, ��� ���-�� �����.",
"����� �����, �����, ���, ��� ����� ��� ����.",
"����� ������ � ���������� �������. �� ������ ���� �����, ���� ��� ���� ������",
"��� ��������, ��� ������, ��� �� �� ����� �����",
"����� - ������, ����� - ������, ��� ��� ����� - ���� ����� �������");

// ���� ������� �� �������
$rand_qwe=array(
"���",
"����",
"�����",
"�����",
"������",
"������",
"������",
"��������",
"�����",
"�����");


// ��� ����������� 4-�� ��������:
$maxkey=4; // ����������� �������� � ����  (����� ��������)
$absrand="233443";// ��������� �����. ������������ ��� �����������. ������������ ��� ����� �������� ��� ��������� ��� ��������� ������������ �������.

if (isset($_GET['image'])) {
// ������� � ������� ������
$st="R0lGODlhCgAMAIABAFNTU////yH5BAEAAAEALAAAAAAKAAwAAAI"; // ����� ����� ��� ���� ��������
function imgwr($st,$num){
 if ($num=="0") {$len="63"; $number=$st."WjIFgi6e+QpMP0jin1bfv2nFaBlJaAQA7";}
 if ($num=="1") {$len="61"; $number=$st."UjA1wG8noXlJsUnlrXhE/+DXb0RUAOw==";}
 if ($num=="2") {$len="64"; $number=$st."XjIFgi6e+QpMPRlbjvFtnfFnchyVJUAAAOw==";}
 if ($num=="3") {$len="64"; $number=$st."XjIFgi6e+Qovs0RkTzXbj+3yTJnUlVgAAOw==";}
 if ($num=="4") {$len="64"; $number=$st."XjA9wG8mWFIty0amczbVJDVHg9oSlZxQAOw==";}
 if ($num=="5") {$len="63"; $number=$st."WTIAJdsuPHovSKGoprhs67mzaJypMAQA7";}
 if ($num=="6") {$len="63"; $number=$st."WjIFoB6vxmFw0pfpihI3jOW1at3FRAQA7";}
 if ($num=="7") {$len="61"; $number=$st."UDI4Xy6vtAIzTyPpg1ndu9oEdNxUAOw==";}
 if ($num=="8") {$len="63"; $number=$st."WjIFgi6e+QpMP2slSpJbn7mFeWDlYAQA7";}
 if ($num=="9") {$len="64"; $number=$st."XjIFgi6e+QpMP0jinvbT2FGGPxmlkohUAOw==";}
 header("Content-type: image/gif"); 
 header("Content-length: $len");
 echo base64_decode($number); }
// ����� ����������� �� ����� (��� ���������� - ����� �� ������)
if (array_key_exists("image", $_REQUEST)) { $num=$_REQUEST["image"];
for ($i=0; $i<10; $i++) {if (md5($i+$absrand)==$num) {imgwr($st,$i); die();}} }
exit;}




$rnd_do=array("�<B>��</B>�","<B>��</B>���","��<B>��</B>����");

// ������� ���������� ��������� if $event=add
if (isset($_GET['event'])) { if ($_GET['event']=="add") {

// ���������� �������� ������ �� ����� � ����������� �� ����������
if (isset ($_POST['name']) & isset ($_POST['msg']) & isset ($_POST['email'])) {$name=$_POST['name']; $msg=$_POST['msg']; $email=$_POST['email'];} else {exit;}

sleep(1); // ������ ������ �� �����. �������� ������� �� ����� - � ����� �� ������� ����� - ����� �������� ����� � �� ��������� ������

if ($antispam=="1") {
$bada="$shapka $back <font color=red>��� �� �������� �� ���������</font> � �������� ����!";
if (isset($_POST['num'])) {$num=$_POST['num'];} else {print"$bada"; exit;}
if (isset($_POST['rand'])) {$rand=$_POST['rand'];} else {print"$bada"; exit;}
if ($num!=$rand) {print"$bada"; exit;}}

if ($antispam=="2") {
$bada="$shapka $back <font color=red>�������� ���� ��� �� ���������</font> � ���������!";
if (isset($_POST['usernum'])) {$usernum=$_POST['usernum'];} else {print"$bada"; exit;}
if (isset($_POST['chek'])) {$chek=$_POST['chek'];} else {print"$bada"; exit;}
$dt=explode("|",$chek);
if ($dt[1]==0) {$number=$dt[0]+$dt[2];}
if ($dt[1]==1) {$number=$dt[0]-$dt[2];}
if ($dt[1]==2) {$number=$dt[0]*$dt[2];}
if ($usernum!=$number) {print"$bada"; exit;}}

if ($antispam=="3") {
$qwe=$_POST['qwe'];
$answer=$_POST['answer'];
if (strtolower($rand_qwe[$qwe])!=strtolower($answer)) {print"$shapka $back <font color=red>����� �� �����!</font> ���������� �����."; exit;}}

if ($antispam=="4") {
$bada="$shapka $back <font color=red>�������� ���� ��� �� �����</font>!";
if (isset($_POST['usernum'])) {$usernum=$_POST['usernum'];} else {print"$bada"; exit;}
if (isset($_POST['xkey'])) {$xkey=$_POST['xkey'];} else {print"$bada"; exit;}
$userkey=md5("$usernum+$absrand");
if ($userkey!=$xkey) {print"$bada"; exit;}}

if ($name == "" || strlen($name) > $maxname) {print "$shapka $back ���� ��� ��� ������, ��� ��������� $maxname ��������!</B></center>"; exit;}
if ($msg == "" || strlen($msg) > $maxmsg) {print "$shapka $back ���� ��������� ��� ������ ��� ��������� $maxmsg ��������.</B></center>"; exit;}
if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)$", $email) and $email != "") {print "$shapka $back � ������� ���������� E-mail �����!</B></center>"; exit;}


$msg=str_replace("|","I",$msg);
$name=wordwrap($name,24,' ',1); // ��������� ������� ������� ������
$msg=wordwrap($msg,75,' ',1);
$today=mktime();

// ���������� ������ ������ � ���� �� �������: ��������|���|�����|����|�����|������|
$text="$msg|$name|$email|$date|$time|$today|";

$text=str_replace("&#032;",' ',$text);
$text=str_replace("&",'&amp;',$text);
$text=str_replace(">",'&gt;',$text);
$text=str_replace("<",'&lt;',$text);
$text=str_replace("\"",'&quot;',$text);
$text=preg_replace("/\n\n/",'<p>',$text);
$text=preg_replace("/\n/",'<br>',$text);
$text=preg_replace("/\\\$/",'&#036;',$text);
$text=preg_replace("/\r/",'',$text);
$text=stripslashes($text);
$text=preg_replace("/\\\/",'&#092;',$text);
$text=str_replace("\r\n","<br> ",$text);
$text=str_replace("\n\n",'<p>',$text);
$text=str_replace("\n",'<br> ',$text);
// �������� 3 � ����� �������
do {$text=str_replace("<br><br><br>","<br>",$text);} while (preg_match("/<br><br><br><br>/i",$text));
// �������� 3 � ����� �������� ������
do {$text=str_replace("   "," ",$text);} while (preg_match("/   /i",$text));
$text=str_replace("\t",' ',$text);
$text=str_replace("\r",' ',$text);
$text=str_replace('   ',' ',$text);

if ($antiflud=="1") {  // ������� �������� �����!
$linesn = file("guest.dat"); $in=count($linesn);
if ($in > 0) {
$lines=file("guest.dat"); $i=count($lines)-1; $itogo=$i; $dtf=explode("|",$lines[$i]);
$txtback="$dtf[0]|$dtf[1]|$dtf[2]|$dtf[3]|"; $lastmsg=$dtf[5];
$dtb=explode("|",$text);
$txtflud="$dtb[0]|$dtb[1]|$dtb[2]|$dtb[3]|";
$today=mktime();
if (($lastmsg+30)>$today) {
$eshe=($lastmsg+30)-$today; print"$back ���� 30 ������ ��������� ��������� ���������. ��������� ��� $eshe ������!"; exit;}
if ($txtflud==$txtback) {print"$back ������ ��������� ��� ���������. ������� � �������� ���������!"; exit;} }
}


$fp=fopen("guest.dat","a+");
flock ($fp,LOCK_EX);
fputs($fp,"$text\r\n");
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("guest.dat", 0644);


if ($sendmail=="1") { // �������� ��������� ������ �� ����
$headers=null;
$headers.="Content-Type: text/plain; charset=windows-1251\r\n";
$headers.="From: ".$name." <".$email.">\r\n";
$headers.="X-Mailer: PHP/".phpversion()."\r\n";
// �������� ��� ���������� � ���� ������
$host=$_SERVER["HTTP_HOST"]; $self=$_SERVER["PHP_SELF"];
$allmsg = $gname.chr(13).chr(10).'����� ��������� � ��������: http://'.$host.$self.chr(13).chr(10).'���: '.$name.chr(13).chr(10).'E-mail: '.$email.chr(13).chr(10).'���������: '.$msg.chr(13).chr(10);
mail("$adminemail", "$gname (���������)", $allmsg, $headers); // ���������� ������ ������� �� �������� ;-)
}


print "$shapka <script language='Javascript'>function reload() {location = 'index.php'}; setTimeout('reload()', 1500);</script>
<table width=100% height=80%><tr><td><table border=1 cellpadding=10 cellspacing=0 bordercolor=#224488 align=center valign=center width=60%><tr><td><center>
�������, <B>$name</B>, ���� ��������� ������� ���������. <BR><BR>����� ��������� ������ �� ������ ������������� ���������� �� ������ �������� ��������.<BR><BR>
<B><a href='index.php'>������� �����, ���� �� ������ ������ �����</a></B></td></tr></table></td></tr></table></center></body></html>";
exit;
}
}



// ���� ������� ��������
if (!isset($_GET['page'])) {$page=1;} else {$page=$_GET['page'];}

print "<html><head>
<title>$gname</title>
<META HTTP-EQUIV='Pragma' CONTENT='no-cache'>
<META HTTP-EQUIV='Cache-Control' CONTENT='no-cache'>
<META content='text/html; charset=windows-1251' http-equiv=Content-Type>
<META content='$gname, $maintext' name=Keywords>
<META content='�������� �����. ����� �� ������ �������� ����� � ����� �����.' name=Description>
<link rel=stylesheet type='text/css' href='images/$skin/style.css'>
<SCRIPT language=JavaScript>
function x () {return;}
function FocusText() {
    document.REPLIER.msg.focus();
    document.REPLIER.msg.select();
    return true; }
function DoSmilie(addSmilie) {
    var revisedmsgage;
    var currentmsgage = document.REPLIER.msg.value;
    revisedmsgage = currentmsgage+addSmilie;
    document.REPLIER.msg.value=revisedmsgage;
    document.REPLIER.msg.focus();
    return;
}
function DoPrompt(action) { var revisedmsgage; var currentmsgage = document.REPLIER.qmsgage.value; }
</SCRIPT>
</head>
<body>

<center><a href=index.php><h3>$gname</h3></a>

<TABLE width=780 align=center cellPadding=0 cellSpacing=0><TBODY>
<TR><TD width='1%'><IMG src='images/$skin/1.gif' width=14 height=12 border=0></TD><TD width='96%' background='images/$skin/2.gif'></TD><TD width='3%'><IMG src='images/$skin/3.gif' width=14 height=12 border=0></TD></TR>
<TR><TD background='images/$skin/4.gif'></TD>
<TD>
<table width=100%><TR>
<TD><B>������� <b>$date</b></TD>
<TD align=center><a href='index.php?event=new&page=$page'>�������� ���������</a></TD>
<TD align=center><a href='$mainpage'>��������� �� �������</a></div></B>
</TD></TR>";

if (strlen($maintext)>5) {print"<TR><TD colspan=3><hr size=-1 width=100%><center>$maintext</center></TD></TR>";}

print "</TABLE></TD>
<TD background='images/$skin/6.gif'>&nbsp;</TD>
</TR><TR><TD><IMG src='images/$skin/8.gif' width=14 height=12 border=0></TD><TD background='images/$skin/5.gif'></TD><TD><IMG src='images/$skin/9.gif' width=14 height=12 border=0></TD></TR>
</TBODY></TABLE>";



if (isset($_GET['event'])) { if ($_GET['event']=="new") {
print "
<TABLE width=780 align=center cellPadding=0 cellSpacing=0><TBODY>
<TR><TD width='1%'><IMG src='images/$skin/1.gif' width=14 height=12 border=0></TD><TD width='96%' background='images/$skin/2.gif'></TD><TD width='3%'><IMG src='images/$skin/3.gif' width=14 height=12 border=0></TD></TR>
<TR><TD background='images/$skin/4.gif'></TD>
<TD><div align=center>�������� ���������</font><BR>
<center><table><tr><td valign=top>
<B>���</B> � E-mail<BR><BR>
<B>���������</B>
<table width=90 height=70><tr><td valign=top>
<A href='javascript:%20x()' onclick=\"DoSmilie(' :-))');\">$s1</a>
<a href='javascript:%20x()' onclick=\"DoSmilie(' :-)');\">$s2</a>
<a href='javascript:%20x()' onclick=\"DoSmilie(' :-P');\">$s3</a>
<a href='javascript:%20x()' onclick=\"DoSmilie(' 8-)');\">$s4</a>
<a href='javascript:%20x()' onclick=\"DoSmilie(' :-(');\">$s5</a>
<A href='javascript:%20x()' onclick=\"DoSmilie(' :-O');\">$s6</a>
<A href='javascript:%20x()' onclick=\"DoSmilie(' ;-)');\">$s7</a>
<A href='javascript:%20x()' onclick=\"DoSmilie(' :roll:');\">$s8</a>
<A href='javascript:%20x()' onclick=\"DoSmilie(' :rf:');\">$s9</a>
<A href='javascript:%20x()' onclick=\"DoSmilie(' 8-(');\">$s10</a>
<A href='javascript:%20x()' onclick=\"DoSmilie(' `-(');\">$s11</a>
<A href='javascript:%20x()' onclick=\"DoSmilie('[RB]  [/RB] ');\"><font color=red><B>RB</b></font></a>
</tr></td></table>
</td><td>
<form action=index.php?event=add method=post name=REPLIER>
<input type=text value='' name=name size=26>&nbsp;
<input type=text value='' name=email size=26><br> 
<textarea cols=55 rows=5 size=500 name=msg></textarea>";

// ������ ������� ���������
if ($antispam=="1") {print"<tr><td align='right'>�������� ���:</td><td>";
$rand_key=array("7531","8642","9753","10864","1975","2186","3197","4298");
$imag_key=array("8642","9753","10864","1975","2186","3197","4298","7531");
$rand = mt_rand(0,7); $rnd=$rand_key[$rand]; $ima=$imag_key[$rand];
print"<img src='images/$ima.png' width=300 height=20 border=0>";
print"</td></tr><input name=rand type=hidden value='$rnd'>
<tr><td align='right'><font color=red>�������� ��� �������:</font></td><td><input name='num' type='text' maxlength=5 size=5></td></tr>";}

// ������ ������� ���������
if ($antispam=="2") {$rnd1=mt_rand(1,9); $rnd2=mt_rand(0,2); $rnd3=mt_rand(1,9);
print"<TR><TD>�������� ��� ��������:</TD><TD><B>$rnd1</B> $rnd_do[$rnd2] <B>$rnd3</B> = <input name='usernum' type='text' maxlength=3 size=5> (���������� � ������� ��������)
<input name=chek type=hidden value='$rnd1|$rnd2|$rnd3|'>";
}
// ������ ������� ���������
if ($antispam=="3") {
$rand = mt_rand(0,9); $rnd=$rand_zag[$rand];
print"<TR><TD>������� �������</TD><TD><B>$rnd</B></TD></TR><TR><TD>������� �����</TD><input name=qwe type=hidden value='$rand'>
<TD><input name='answer' type='text' maxlength=30 size=15> (� ������ �� ����������� �������)";}

// �������� ������� ���������
if ($antispam=="4") {

// ����� ����������� �� ����� (��� ���������� - ����� �� ������)
if (array_key_exists("image", $_REQUEST)) { $num=$_REQUEST["image"];
for ($i=0; $i<10; $i++) {if (md5($i+$absrand)==$num) {imgwr($st,$i); die();}} }

$xkey=""; mt_srand(time()+(double)microtime()*1000000);

print"<TR><TD>�������� ���:</TD><TD>";
for ($i=0; $i<$maxkey; $i++) {
$snum[$i]=mt_rand(0,9); $psnum=md5($snum[$i]+$absrand);
$phpself=$_SERVER["PHP_SELF"];
echo "<img src=$phpself?image=$psnum border='0' alt=''>\n";
$xkey=$xkey.$snum[$i];
}
$xkey=md5("$xkey+$absrand");

print" <input name='usernum' type='text' maxlength=$maxkey size=6> (������� �����, ��������� �� ��������)
<input name=xkey type=hidden value='$xkey'>";
}


   print"<tr><td align='center' colspan=2><input type='submit' value=' �������� '></td></tr>
</table>
</TD>

<TD background='images/$skin/6.gif'>&nbsp;</TD>
</TR><TR><TD><IMG src='images/$skin/8.gif' width=14 height=12 border=0></TD><TD background='images/$skin/5.gif'></TD><TD><IMG src='images/$skin/9.gif' width=14 height=12 border=0></TD></TR>
</TBODY></TABLE>";
} }


// ��������� ������ � ������
$lines = file("guest.dat");
$maxi = count($lines)-1;

// ������� ������ ��������� ������� ������� ������
if (isset($_GET['page'])) {$page=$_GET['page'];} else {$page="1";}
if ($page==0) {$page="1";} else {$page=abs($page);}

print "��������:&nbsp; ";
for($i=0; $i<$maxi+1;) {$ip=$i/$qq+1;
if ($page==$ip) {print "<B>$ip</B> &nbsp;";} else {print "<a href=\"index.php?page=$ip\">$ip</a> &nbsp;";}
$i=$i+$qq;}


// ������� qq ��������� �� ������� ��������

$maxpage=ceil(($maxi+1)/$qq); if ($page>$maxpage) {$page=$maxpage;}

if ($msginout=="1") 
{ $fm=$qq*($page-1); if ($fm>$maxi) {$fm=$maxi-$qq;}
  $lm=$fm+$qq; if ($lm>$maxi) {$lm=$maxi+1;} }
else 
{ $fm=$maxi-$qq*($page-1); if ($fm<"0") {$fm=$qq;}
  $lm=$fm-$qq; if ($lm<"0") {$lm="-1";} }

do { $dt = explode("|", $lines[$fm]);
if ($msginout=="1") {$fm++; $num=$maxi-$fm+2;} else {$fm--; $num=$fm+2;}

// �������� ��������� �������� �� �����������
$dt[0]=str_replace(":-))",$s1,$dt[0]);
$dt[0]=str_replace(":-)",$s2,$dt[0]);
$dt[0]=str_replace(":-P",$s3,$dt[0]);
$dt[0]=str_replace("8-)",$s4,$dt[0]);
$dt[0]=str_replace(":-(",$s5,$dt[0]);
$dt[0]=str_replace(":-O",$s6,$dt[0]);
$dt[0]=str_replace(";-)",$s7,$dt[0]);
$dt[0]=str_replace(":roll:",$s8,$dt[0]);
$dt[0]=str_replace(":rf:",$s9,$dt[0]);
$dt[0]=str_replace("8-(",$s10,$dt[0]);
$dt[0]=str_replace("`-(",$s11,$dt[0]);
$dt[0]=str_replace("[RB]","<B><font color=red>", $dt[0]);
$dt[0]=str_replace("[/RB]","</font></B>", $dt[0]);
$dt[0]=str_replace("&amp;#124;","&#124;",$dt[0]);
if ($liteurl=="1") {$dt[0]=eregi_replace("((https?|ftp)://[[:alnum:]_=/-]+(\\.[[:alnum:]_=/-]+)*(/[[:alnum:]+&._=/~%]*(\\?[[:alnum:]?+&;_=/%]*)?)?)", "<a href='\\1' target='_blank'>\\1</a>", $dt[0]);}

print"
<TABLE width=780 align=center cellPadding=0 cellSpacing=0><TBODY>
<TR><TD width='1%'><IMG src='images/$skin/1.gif' width=14 height=12 border=0></TD><TD width='96%' background='images/$skin/2.gif'></TD><TD width='3%'><IMG src='images/$skin/3.gif' width=14 height=12 border=0></TD></TR>
<TR><TD background='images/$skin/4.gif'></TD>
<TD><B><a href='mailto:$dt[2]'>$dt[1]</a> ($dt[3] $dt[4])</B>
<UL><em>$dt[0]</em>
<div align=right>$num</div></TD>
<TD background='images/$skin/6.gif'>&nbsp;</TD>
</TR><TR><TD><IMG src='images/$skin/8.gif' width=14 height=12 border=0></TD><TD background='images/$skin/5.gif'></TD><TD><IMG src='images/$skin/9.gif' width=14 height=12 border=0></TD></TR>
</TBODY></TABLE>
";


if ($msginout=="1") {$whm=$fm; $whe=$lm;} else {$whm=$lm; $whe=$fm;}
} while($whm < $whe);




// ������� ������ ��������� ������� ������� �����
print "��������:&nbsp; ";
for($i=0; $i<$maxi+1;) {$ip=$i/$qq+1;
if ($page==$ip) {print "<B>$ip</B> &nbsp;";} else {print "<a href=\"index.php?page=$ip\">$ip</a> &nbsp;";}
$i=$i+$qq;}



print "<BR><BR><center><font size=-2>Powered by <a href='http://www.wr-script.ru/'>WR-Guest</a> &copy; 1.7M</font></body></html>";
?>
