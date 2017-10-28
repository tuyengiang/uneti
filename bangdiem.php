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
	<title>UnetiForm - Bảng Điểm Sinh Viên
	</title>
	<meta charset="utf-8">
	<meta name="author" content="Nguyễn Tuyển Giảng">
	<meta name="description" content="Ứng Dụng Web Tra Cứu Thông Tin Sinh Viên Uneti Nhanh Nhất">
	<meta name="keyword" content="tra cứu thông tin,tra cuu diem uneti,tra cuu lich hoc">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/style-main.css" type="text/css">
	<link rel="stylesheet" href="css/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="js/slick/slick-tap/slick.css">
	<link rel="stylesheet" type="text/css" href="js/slick/slick-tap/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="js/jquery.bxslider.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/title.gif">
	<link rel="icon" href="img/title.gif" type="image/x-icon"/>

	<script src="js/jquery.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/slick/slick-tap/slick.min.js"></script>
	<script src="js/wow/dist/wow.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
			new WOW().init();
	</script>
</head>

<body>

	<?php require_once("temp/headerpro.php");?>
<div id="index-main" class="wow bounceInUp">

	<div class="main-title"><i class="fa fa-calculator"></i> BẢNG ĐIỂM SINH VIÊN</div>
			

			<div class="bang-diem-2">
				<?php 
					$bangDiemArray = $html->find("table.tblKetQuaHocTap");
					 echo "<table class='table-bang-diem-2'>"
					 		. $bangDiemArray[1]->innertext 
					 	. "</table>";
				?>
			</div>
			<div id="menu-class" style="width:40%;margin:auto;margin-top:30px;margin-bottom:20px;">
					<ul>
						<li><a href="lichhoc.php"><i class="fa fa-calendar"></i> Lịch Học</a></li>
						<li><a href="bangdiem.php" class="active"><i class="fa fa-calculator"></i> Bảng Điểm</a></li>
						 <li><a href="lichthi.php"><i class="fa fa-calendar"></i> Lịch Thi</a></li>
					</ul>

			 </div><!--menu-class-->
	
</div><!--main-->
<div style="clear:left;"></div>
<?php require_once("temp/bottom.php");?>

</body>
</html>