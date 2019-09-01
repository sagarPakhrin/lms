<?php
require_once "config.php";
if(isset($_SESSION['access_token']))
{
		$gClient->setAccessToken($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
		$gClient->authenticate($_GET['code']);
		$_SESSION['access_token'] =$gClient->getAccessToken();
}

$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo->get();
$_SESSION['username'] = $userData['givenName'];
header("location: index.php?login=success");
exit();
?>
