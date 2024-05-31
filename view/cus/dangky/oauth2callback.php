<?php
require_once 'vendor/autoload.php';

session_start();

// Replace these with your own values
$clientID = '518795742590-khm6qvjatokc6rrema282dg93h691fvr.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/GOURMEZ-WEB/CONTROLLER/tranghienthi.php?quanly=trangchu';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');
$client->addScope('https://www.googleapis.com/auth/user.phonenumbers.read');

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect_uri = 'YOUR_FINAL_REDIRECT_URI';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
?>
