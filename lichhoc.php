<?php
	session_start();
	require_once("inc/simple_html_dom.php");

	$url="http://daotao.uneti.edu.vn/XemLichHoc.aspx?MSSV=";
	$msv=$_SESSION["msv"];

	$curl=curl_init($url.$msv);

	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);


	$resource=curl_exec($curl);

	if(!($resource)) die("Mất mạng rồi ");

	$html=new simple_html_dom();
	$html->load($resource);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lịch Học Sinh Viên</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<srcipt src="js/jquery.js"></srcipt>
	<srcipt src="js/main.js"></srcipt>

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
					<li><a href="lichhoc.php" class="active">Lịch Học</a></li>
					<li><a href="bangdiem.php">Bảng Điểm</a></li>
					<li><a href="index.php">Đăng Xuất</a></li>
				</ul>
			</div><!--menu-->

		</div><!--header-top-->
	</div><!--header-->
	<div id="main">
		<div id="title">&hearts; Lịch Học Tập &hearts;</div>
		<div id="tbk">
			
			<div class="tbk-1">
				<?php
					$tkb=$html->find("table#detailTbl");

					echo "<table class='table'>".$tkb[0]->innertext. "</table>";


				?>

			</div>
		</div><!--main-->

	</div><!--main-->
</div>
</body>
</html>