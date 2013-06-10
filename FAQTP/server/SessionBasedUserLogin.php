<?php
include('/../FAQTP/business/fascade/fascade.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$userName = $_POST['username'];
	$userPW = $_POST['passwort'];
	if(checkUser($userName,$userPW)==true){
		if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
			if (php_sapi_name() == 'cgi') {
				header('Status: 303 See Other');
			}
			else {
				header('HTTP/1.1 303 See Other');
			}
		}

		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
		exit;
	}
}else{
	header("HTTP/1.1 403 Forbidden");
	exit( file_get_contents( '/../business/fascade/errorpage.php' ) );
}
echo $userName;
?>