<?php
session_start();
require_once "GoogleApi/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("1017053470125-nksjhr3rlmuui2e77u7l4foep4roqg60.apps.googleusercontent.com");
$gClient->setClientSecret("5psqxNl3PGJiC6SLibXb_Upy");

$gClient->setApplicationName("lmsproject");
$gClient->setRedirectUri("http://localhost/lms/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");
?>
