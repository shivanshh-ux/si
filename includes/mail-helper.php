<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../PHPMailer/Exception.php';
require __DIR__ . '/../PHPMailer/PHPMailer.php';
require __DIR__ . '/../PHPMailer/SMTP.php';

/**
 * Sends a verification email with an OTP.
 * 
 * @param string $toEmail The recipient's email address.
 * @param string $otp The one-time password to send.
 * @param string $userName The user's name (optional).
 * @return bool True on success, False on failure.
 */
function sendVerificationEmail($toEmail, $otp, $userName = 'Student') {
    $mail = new PHPMailer(true);

    try {
        // Server settings - These should be updated with real SMTP credentials
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com'; // Example: Gmail SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@akiraaonline.com'; // SMTP username
        $mail->Password   = 'VsS@VKY07'; // SMTP password (use App Password for Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('info@akiraaonline.com', 'SIU UNIVERSE');
        $mail->addAddress($toEmail, $userName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Verify Your SIU UNIVERSE Account';
        $mail->Body    = "
            <div style='font-family: sans-serif; padding: 20px; color: #333;'>
                <h2 style='color: #3B82F6;'>Welcome to SIU UNIVERSE!</h2>
                <p>Thank you for signing up. Please use the following code to verify your email address:</p>
                <div style='background: #f3f4f6; padding: 15px; border-radius: 8px; text-align: center; margin: 20px 0;'>
                    <span style='font-size: 24px; font-bold; letter-spacing: 5px; color: #1E40AF;'>$otp</span>
                </div>
                <p>If you didn't request this, please ignore this email.</p>
                <hr style='border: 0; border-top: 1px solid #eee; margin-top: 20px;'>
                <p style='font-size: 12px; color: #888;'>SIU UNIVERSE - Symbiosis International University Student Community</p>
            </div>
        ";
        $mail->AltBody = "Welcome to SIU UNIVERSE! Your verification code is: $otp";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("PHPMailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
