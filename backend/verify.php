<?php
require_once('connection.php');
// Generate token
$token = bin2hex(random_bytes(16));

// Store token in your database along with the user's email
// Assume user ID is known ($userId) and you have a DB connection ($pdo)
// $stmt = $pdo->prepare("UPDATE users SET token = ?, token_expiry = ? WHERE id = ?");
// $stmt->execute([$token, date('Y-m-d H:i:s', strtotime('+1 hour')), $userId]);

// Email details
$email = 'user@example.com';
$subject = 'Email Verification';
$headers = 'From: no-reply@yourdomain.com' . "\r\n";
$message = "Please click the link to verify your email:\n";
$message .= "https://yourdomain.com/verify.php?token=$token";

// Send email
if (mail($email, $subject, $message, $headers)) {
    echo "Verification email sent to $email";
} else {
    echo "Failed to send email.";
}
?>
