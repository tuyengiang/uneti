<?php
	session_start();
	require_once("inc/simple_html_dom.php");

	$url="http://daotao.uneti.edu.vn/XemDiem.aspx?MSSV=";

	$msv=$_SESSION["msv"];

	$curl=curl_init($url.$msv);

	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

	$resource=curl_exec($curl);

	if(!($resource)) die("Mất mạng con mẹ nó rồi");

	$html=new simple_html_dom();
	$html->load($resource);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông Tin Điểm Sinh Viên</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
</head>
<body>
  <div id="website">
	<div id="header">
		<div id="header-top">
			<div id="logo">
				<a href="index.php"><img src="img/logo2.png" title="Trang Chu"></a>	
			</div><!--logo-->
			<div id="menu">
				<ul>
					<li><a href="#">Giới Thiệu</a></li>
					<li><a href="Profile.php">Thông Tin</a></li>
					<li><a href="lichhoc.php">Lịch Học</a></li>
					<li><a href="bangdiem.php" class="active">Bảng Điểm</a></li>
					<li><a href="index.php">Đăng Xuất</a></li>
				</ul>
			</div><!--menu-->

		</div><!--header-top-->
	</div><!--header-->



<div id="main">

	<div id="title">&hearts; Thông Tin Điểm &hearts;</div>
		<div id="main-contet">
			<div class="bang-diem-1">
				<?php 
					$bangDiemArray = $html->find("table.tblKetQuaHocTap");
					echo
						"<table class='table-bang-diem-1'>".
							 $bangDiemArray[0]->innertext 
						 .'</table>';
				?>
			</div>

			<div class="bang-diem-2">
				<?php 
					 echo "<table class='table-bang-diem-2'>"
					 		. $bangDiemArray[1]->innertext 
					 	. "</table>";
				?>
			</div>
		</div>
		<div style="clear:left;"></div>
	
</div><!--main-->

</body>
</html>