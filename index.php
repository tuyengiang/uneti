<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Trang Tra Cứu Thông Tin Sv - Uneti</title>

	<style>
		*{
			padding:0; margin:0;
			font-family:roboto,arial,ubuntu;
			font-size:15px;
		}

		body{
			background:white;
		}
		#header{
			width:100%;
			height:140px;
			background:white;
			box-shadow:2px 2px 2px 2px rgba(0,0,0,0.1);
		}
		#header-top{
			width:48%;
			margin:auto;
			height:140px;
		}
		#logo{
			float:left;
			width:25%;
			height:140px;

		}
		#logo img{
			width:100%;
			height:140px;
		}
		#text{
			float:left;
			width:70%;
			padding-top:80px;
			color:#1C86EE;
			font-size:30px;
			font-weight:bold;
		}
		/**main**/

		#main{
			width:80%;
			margin:auto;
			height:300px;
			margin-top:10px;
		}
		#form{
			width:50%;
			height:200px;
			margin-top:70px;
			border-radius:0.5em;
			box-shadow:2px 2px 2px 2px rgba(0,0,0,0.1);
		}
		#bottom{
			width:100%;
			height:150px;
			text-align:center;
			color:#1C86EE;
			font-weight:bold;
			font-size:30px;
			padding-top:30px;
			box-shadow:2px 2px 5px 2px rgba(0,0,0,0.1);
		}
		/***/
		h2{
			width:100%;
			height:60px;
			text-align:center;
			color:white;
			line-height:60px;
			font-size:20px;
			border-top-left-radius:0.5em;
			border-top-right-radius:0.5em;
			background:#1C86EE;
		}
		form{
			width:100%;
			height:110px;
			margin-top:50px;
		}
		input[type="number"]{
			width:70%;
			height:40px;
			border:1px solid #ddd;
			text-align:center;
			border-radius:0.3em;
			font-size:20px;
			font-weight:bold;
			color:#1C86EE;
		}
		button{
			width:25%;
			height:40px;
			background:#1C86EE;
			border:none;
			color:white;
			border-radius:0.3em;
			font-size:18px;
			font-weight:bold;
			cursor:pointer;
			transition:1s ease all;
		}
		button:hover{
			transition:1s ease all;
			background:#00688B;
		}


	</style>

</head>
<body>
	<div id="header">
		<div id="header-top">
			<div id="logo">
				<img src="img/logo.jpg" title="Uneti">
			</div><!--logo-->

			<div id="text">
				Tra  Cứu Thông Tin Sv - Uneti
			</div><!--tẽt-->
		</div><!--header-->

	</div><!--header-->

	<div id="main">
		<center><div id="form">
			<h2>Tra Cứu Thông Tin Sinh Viên</h2>
			<form method="get" action="Profile.php">
				<label>
					<input type="number" name="msv" placeholder="Nhập Mã SV">
					<button type="submit">Tra Cứu</button>

				</label>
			</form>

		</div></center><!--form-->

	</div><!--main-->
	<div id="bottom">
		Version 0.0.01 Alpha

	</div><!--bottom-->
</body>
</html>