
<?php
session_start();

// Static credentials for testing
$staticEmail = 'user@example.com';
$staticPassword = '123456';


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (
    hash_equals($staticEmail, $email) &&
    hash_equals($staticPassword, $password)
) {
    // Prevent session fixation
    session_regenerate_id(true);

    $_SESSION['authenticated'] = true;
    $_SESSION['user'] = $staticEmail;

    header('Location: profile.php');
    exit;
}

// Invalid credentials
header('Location: login.php?error=1');
exit;
