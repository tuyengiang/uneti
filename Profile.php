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
	<title>UnetiForm - Trang Tra Cứu Thông Tin
	</title>
	<meta charset="utf-8">
	<meta name="author" content="Nguyễn Tuyển Giảng">
	<meta name="description" content="Ứng Dụng Web Tra Cứu Thông Tin Sinh Viên Uneti Nhanh Nhất">
	<meta name="keyword" content="tra cứu thông tin,tra cuu diem uneti,tra cuu lich hoc">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
		<div id="header">
		<div id="img">
			<img src="img/nen.png">
		</div>
		<div id="top-icon" class="wow bounceInDown">
			<div id="icon">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
			</div><!--icon-->

		</div><!--top-icon-->
		<div id="header-content">
			
			<div style="clear:left;"></div>
			<div id="logo" class="wow bounceInLeft">
				<a href="index.php"><img src="img/logouneti.png"></a>
			</div><!--logo-->
			<div id="menu" class="wow bounceInRight">
				<ul>
					<li><a href="index.php"><i class="fa fa-home"></i> Trang Chủ</a></li>
					<li><a href="http://uneti.ga"><i class="fa fa-chevron-circle-left"></i> Uneti.Ga</a></li>
					<li><a href="index.php"><i class="fa fa-sign-out"></i> LogOut</a></li>
				</ul>

			</div><!--menu-->
			<div id="search" class="wow bounceInUp">
					<center><p style="font-size:30px;color:white;font-weight:bold;border-bottom:none">Mã Sinh Viên Của Bạn</p></center>
					<form method="get" id="form" action="Profile.php">
						<input type="search" name="msv" placeholder="Nhập Mã Sinh Viên" value="<?php echo $msv; ?>" ReadOnly>
						<button type="submit" id="btn"><i class="fa fa-search"></i> Tìm Kiếm</button>

					</form>

			</div><!--search-->
			<div id="lua-chon" class="wow bounceInUp">
					<div class="lua-chon-list">
							<center><a href="gioithieu.php"><i class="fa fa-cube"></i></a></center><br>
							<center><a href="#">Giới Thiệu</a></center><br>
					</div>
					<div class="lua-chon-list">
							<center><a href="Profile.php"><i class="fa fa-user"></i></a></center><br>
							<center><a href="Profile.php">Thông Tin Bạn</a></center><br>
					</div>
					<div class="lua-chon-list">
							<center><a href="lichhoc.php"><i class="fa fa-calendar"></i></a></center><br>
							<center><a href="lichhoc.php">Lịch Học</a></center><br>
					</div>
					<div class="lua-chon-list">
							<center><a href="bangdiem.php"><i class="fa fa-calculator"></i></a></center><br>
							<center><a href="bangdiem.php">Xem Điểm</a></center><br>
					</div>
					<div class="lua-chon-list">
							<center><a href="lichthi.php"><i class="fa fa-calendar"></i></a></center><br>
							<center><a href="lichthi.php">Lịch Thi</a></center><br>
					</div>

			</div><!--luachon-->
		</div><!--header-content-->

	</div><!--header-->

	<div id="index-main">

		<div class="main-title"><i class="fa fa-user"></i> THÔNG TIN SINH VIÊN </div>
		
			<div id="img-content" class="wow bounceInLeft">
				<?php 
					echo "<img src='" . $baseUrl . "/" . $avatar[0]->src . "' /> <br/>"; 
					echo "<h1>"."<font color='red'>SV: </font>" .explode("<br />" , $ten[0]->innertext )[1] .  "</h1>" ; // lay ten thang giang 
				?>

			</div><!--img-->
			<div id="thong-tin" class="wow bounceInRight">

				
						<?php 
							$tables = $html->find( "table.none-grid") ; // array chua table thong tin que quan + thong tin hoc tap 
						?>
						<div id="thong-tin-sv">
							<h6><i class="fa fa-caret-down"></i>  <?= explode("<br />" , $ten[0]->innertext )[1] ?></h6>

							<div class="thong-tin-sv-content">
								<?= $tables[0]; // table thông tin cơ bản ?>
							</div>
						 </div><!-- #thong-tin-sv -->


						 <div id="thong-tin-hoc-tap">
						 	<h6><i class="fa fa-caret-down"></i> THÔNG TIN ĐÀO TẠO</h6>
						 	<div class="thong-tin-sv-content">
						 		<?= $tables[1]; ?>
						 	</div>
						 </div><!-- #thong-tin-hoc-tap -->

						 <div id="menu-class">
						 		<ul>
						 			<li><a href="lichhoc.php"><i class="fa fa-calendar"></i> Lịch Học</a></li>
						 			<li><a href="lichhoc.php"><i class="fa fa-calculator"></i> Bảng Điểm</a></li>
						 			<li><a href="lichthi.php"><i class="fa fa-calendar"></i> Lịch Thi</a></li>
						 		</ul>

						 </div><!--menu-class-->
			</div>
		<div style="clear:left;"></div>
</div><!--main-->

	<?php require_once("temp/bottom.php");?>
	

	
</div>
</body>
</html>

	