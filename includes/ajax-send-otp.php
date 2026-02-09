<?php
session_start();
require_once 'mail-helper.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
        exit;
    }

    // Generate 6-digit OTP
    $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    $_SESSION['verification_otp'] = $otp;
    $_SESSION['temp_email'] = $email;

    // Send email
    if (sendVerificationEmail($email, $otp)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send email. Please check your SMTP settings in mail-helper.php.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
