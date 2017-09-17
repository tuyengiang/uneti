<!DOCTYPE html>
<html>
<head>
	<title>Phần mềm Tra Cứu Thông Tin Sinh Viên Nhanh Nhất</title>
	<meta charset="utf-8"/>
	<style>
		body{
			margin:0;
			padding:0;
			font-family:ubuntu;
			background:url("img/nen.jpg");
		}
		#main{
			width:42%;
			height:230px;
			margin:auto;
			margin-top:150px;
			background:white;
			opacity:0.8;
			border-radius:0.5em;
		}
		#main img{
			float:left;
			margin-top:50px;
			width:30%;
			height:120px;

		}
		
		input{
			height:30px;
			width:40%;
			margin-top:100px;
			padding-left:10px;
			font-size:15px;
			font-weight:bold;
		}
		button{
			width:20%;
			margin-top:100px;
			height:40px;
			background:#1C86EE;
			color:white;
			border:none;
			font-weight:bold;
			font-size:18px;
			cursor:pointer;
			transition:1s ease all;
		}
		button:hover{
			transition:1s ease all;
			background:blue;
		}
		h6{
			width:60%;
			margin:auto;
			text-align:center;
			font-size:16px;
			color:#1C86EE;
		}

	</style>
</head>
<body>
	<div id="main">
		<img src="img/logo.jpg">
		<form method="get" action="Profile.php">
		<label>
			<input type="text" name="msv" placeholder="Nhập Mã SV">
			<button type="submit">Tra Cứu</button>
		</label>

		</form>
		<div style="clear:left;"></div>
		<h6>Building: Tuyển Giảng &copy;</h6>


	</div><!--main-->
</body>
</html>