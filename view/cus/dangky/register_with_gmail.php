<?php
require_once 'vendor/autoload.php';
 // Your database connection script
 $host = "localhost";
 $username = "root";
 $password = "";
 $database = "gourmez_web";
 $conn = new mysqli($host, $username, $password, $database);

 if ($conn->connect_error) {
     die('Kết nối không thành công: ' . $conn->connect_error);
 } 
session_start();

// Replace these with your own values
$clientID = '518795742590-khm6qvjatokc6rrema282dg93h691fvr.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/GOURMEZ-WEB/CONTROLLER/tranghienthi.php?quanly=dangnhap';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');
$client->addScope('https://www.googleapis.com/auth/user.phonenumbers.read');

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $oauth2 = new Google_Service_Oauth2($client);
    $userinfo = $oauth2->userinfo->get();

    // Retrieve user data
    $email = $userinfo->email;
    $name = $userinfo->name;
    // You might need to use Google People API to get phone number
    $people_service = new Google_Service_PeopleService($client);
    $person = $people_service->people->get('people/me', ['personFields' => 'phoneNumbers']);
    $phone = isset($person->phoneNumbers[0]->value) ? $person->phoneNumbers[0]->value : '';

    // Save user data to the database
    $stmt = $conn->prepare("INSERT INTO user (email, user_name, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $name, $phone);
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
?>
