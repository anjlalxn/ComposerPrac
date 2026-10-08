<?php
$email = $_POST['email'];
$password = $_POST['password'];

$email =trim($_POST['email']?? '');
$password = $_POST['password']?? '';

if (empty($email) || empty($password)) {
    echo "Email and password are required.";
    exit;
}
if ($email === '' || $password === '') {
    echo "Email and password cannot be empty.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
}

//if (!$user||!password_verify($password, $user['password'])) {
    //echo "Invalid email or password.";
    //exit;
//}