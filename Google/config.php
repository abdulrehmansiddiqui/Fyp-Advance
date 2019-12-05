<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("1045265784317-csrni3dudilbh4r1pvj331knqdk1d11c.apps.googleusercontent.com");
	$gClient->setClientSecret("se5WNufm6HLxdprBv5TP5VI3");
	$gClient->setApplicationName("frantic");
	$gClient->setRedirectUri("http://localhost/fyp/Google/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
