<?php
require_once 'vendor/autoload.php';

session_start();

// Replace these with your own values
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'YOUR_REDIRECT_URI';

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
