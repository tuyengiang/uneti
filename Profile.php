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
	$masv=$_SESSION["msv"];
	$curl = curl_init( $url . $masv );
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
	<link rel="stylesheet" type="text/css" href="css/style1.css"/>
</head>
<body>
	<div id="header">
		<div id="header-top">
			<div id="logo">
				<a href="index.php"><img src="img/logo2.png" title="Trang Chu"></a>
			</div><!--logo-->
			<div id="menu">
				<ul>
					<li><a href="#">Giới Thiệu</a></li>
					<li><a href="Profile.php" class="active">Thông Tin</a></li>
					<li><a href="lichhoc.php">Lịch Học</a></li>
					<li><a href="bangdiem.php">Bảng Điểm</a></li>
					<li><a href="index.php">Đăng Xuất</a></li>
				</ul>
			</div><!--menu-->

		</div><!--header-top-->
	</div><!--header-->


	<div id="main">

		<div id="title">&hearts; Thông Tin Sinh Viên &hearts;</div>
		<div id="main-content">
			<div id="img">
				<?php 
					echo "<img src='" . $baseUrl . "/" . $avatar[0]->src . "' /> <br/>"; 
					echo "<h1>"."<font color='red'>SV: </font>" .explode("<br />" , $ten[0]->innertext )[1] .  "</h1>" ; // lay ten thang giang 
				?>

			</div><!--img-->
			<div id="thong-tin">

				
						<?php 
							$tables = $html->find( "table.none-grid") ; // array chua table thong tin que quan + thong tin hoc tap 
						?>
						<div id="thong-tin-sv">
							<h6><?= explode("<br />" , $ten[0]->innertext )[1] ?></h6>

							<?= $tables[0]; // table thông tin cơ bản ?>
						 </div><!-- #thong-tin-sv -->


						 <div id="thong-tin-hoc-tap">
						 	<h6>THÔNG TIN ĐÀO TẠO</h6>
						 	<?= $tables[1]; ?>
						 </div><!-- #thong-tin-hoc-tap -->
			</div>
			</div><!--main-content-->
		<div style="clear:left;"></div>
</div><!--main-->

	
	

	
</div>
</body>
</html>

	