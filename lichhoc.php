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
	<title>Thông Tin Sv</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
  <div id="website">
	<div id="header">
		
		<div id="logo">
				<img src="img/logo.jpg" title="Uneti">
		</div><!--logo-->
		<div id="menu">
			<ul>
				<li><a href="index.php">Trang Chủ</a></li>
				<li><a href="lichhoc.php">Lịch Học</a></li>
				<li><a href="congno.php">Công Nợ</a></li>
			</ul>

		</div><!--menu-->
	</div><!--header-->
	<div id="title">Lịch Học Tập</div>
	<div id="tbk">
		
		<div class="tbk-1">
			<?php
				$tkb=$html->find("table#detailTbl");

				echo "<table class='table'>".$tkb[0]->innertext. "</table>";


			?>

		</div>
	</div><!--main-->

	<div id="bottom">
		&nbsp; Version 0.0.001  Alpha

	</div><!--bottom-->
</div>
</body>
</html>