<?php 
	session_start();
if( !isset( $_GET["msv"] ) ) die("wtf?, nhập cái gì vào đi ! ");
if( isset( $_GET["msv"] )  && !is_numeric( $_GET["msv"] )  ) die( "Mày nhập hẳn hoi :| " );

	require_once("inc/simple_html_dom.php");
	// set up curl 
	$baseUrl = "http://daotao.uneti.edu.vn";
	$url = "http://daotao.uneti.edu.vn/XemDiem.aspx?MSSV=" ;
	$msv = trim($_GET["msv"]); // xoa khoang trang 2 dau 
	$_SESSION["msv"]=$msv;
	$curl = curl_init( $url . $msv );
	//setup curl 
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER , true );
	//chay + tra ve 
	$resource = curl_exec( $curl ); // trong dk dep, ko mat mang 
	
	if( !$resource ) die("Mất cmn mạng rồi :(( ");
	$html = new  simple_html_dom();
	$html->load( $resource ); // lấy dc hết thông tin rồi ! 
	
	//check neu tra ve ko  ton tai 
	/*$ifExists = $html->find("center")[0];
	if( !($ifExists->innertext) ) 
			die("MSV ko ton tai :(( ");*/
	
	//lay thu cai anh dai dien cua thang Gỉang: 
	$avatar = $html->find( "img.hinh-sinhvien" ); //lay anh cua No
	$ten = $html->find("div.title-group"); // lay ten thang Giang
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
	<div id="title">Thông Tin Sinh Viên</div>
	<div id="img">
		<?php 
			echo "<img src='" . $baseUrl . "/" . $avatar[0]->src . "' /> <br/>"; 
			echo "<h1>"   . explode("<br />" , $ten[0]->innertext )[1] .  "</h1>" ; // lay ten thang giang 
		?>

	</div><!--img-->

	<div id="thong-tin">

		
				<?php 
					$tables = $html->find( "table.none-grid") ; // array chua table thong tin que quan + thong tin hoc tap 
				?>
				<div id="thong-tin-sv">
					<h6>Thông tin sinh viên: <?= $ten[0]->innertext ?></h6>

					<?= $tables[0]; // table thông tin cơ bản ?>
				 </div><!-- #thong-tin-sv -->


				 <div id="thong-tin-hoc-tap">
				 	<h6>Thông tin học tập của: <?php echo $ten[0]->innertext ?></h6>
				 	<?= $tables[1]; ?>
				 </div><!-- #thong-tin-hoc-tap -->
				 <br>
				

				 <br/>

	</div>

	<div style="clear:left;"></div>
	<div class="right">

		<div id="title">Thông Tin Điểm</div>
			
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

	</div><!-- ben-phai -->
	<div id="bottom">
		Version 0.0.001  Alpha

	</div><!--bottom-->

	
</div>
</body>
</html>

	