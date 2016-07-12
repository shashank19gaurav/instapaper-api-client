<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use InstapaperAPI\InstapaperOAuth;
$consumer_key = ""; // <-------------------------------------------------------------------------------------- You must configure this value for the sample application to work.
$consumer_secret = ""; // <----------------------------------------------------------------------------------- You must configure this value for the sample application to work.
$instapaper = new InstapaperOAuth($consumer_key,$consumer_secret);
$x_auth_username = ""; // <----------------------------------------------------------------------------------- You must configure this value for the sample application to work.
$x_auth_password = ""; // <----------------------------------------------------------------------------------- You must configure this value for the sample application to work.

$token = $instapaper->get_access_token($x_auth_username,$x_auth_password);
$oauth_token = $token["oauth_token"]; 
$oauth_token_secret = $token["oauth_token_secret"];


/** 4. Once you have that information, use it to re-create the InstapaperOAuth object. */
$instapaper = new InstapaperOAuth($consumer_key,$consumer_secret,$oauth_token,$oauth_token_secret);


// Test API and Access Token
$result = ($instapaper->verify_credentials());
$user = $result[0];
echo '<h1>' . $user->username . '</h1>';
