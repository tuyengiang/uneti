<?php 
//load thu vien simple_html_dom parse
	require_once( "inc/simplehtmldom_1_5/simple_html_dom.php" );
	$url = "https://www.google.com.vn";
//CURL: https://freetuts.net/hoc-php/hoc-curl-php
	$curl = curl_init( $url ); //khoi tao curl  
			// Tien hanh cau hinh url 
	// $USER_AGENT = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2";
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ); // cai cho no tra ve kq thay echo ra 
	// curl_setopt( $curl, CURLOPT_USERAGENT , $USER_AGENT ); // gia vo la FF, chay tren Windowws
	$resource = curl_exec( $curl); //sau khi chay ham nay, tra ve DOM
	$htmlDom = new simple_html_dom(); // khoi tao doi tuong simple_html_dom
	// var_dump( $resource );
	$htmlDom->load( $resource ); //resource
	$links = $htmlDom->find( "img" );  //neu co kq, tra ve 1 doi tuong 
	// echo $logo->plaintext; //tra ve text 
	foreach( $links as $link ){
		echo  "<img src='" .$url  . $link->src . "'><br/>" ;
	}
	
	// die();
	// Create DOM from URL or file