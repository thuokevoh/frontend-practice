<?php
require 'db_connect.php';

date_default_timezone_set('Africa/Nairobi');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // Check if email exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Remove any existing tokens for this user
        $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->execute([$email]);

        // Generate a new token
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Insert token into DB
        $stmt = $pdo->prepare("
            INSERT INTO password_resets (email, token, expires_at)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([$email, $token, $expires]);

        // Simulate sending the email
        $resetLink = "http://localhost:8000/reset_password.php?token=$token";
        echo "A password reset link has been sent to your email.<br>";
        echo "<a href='$resetLink'>$resetLink</a>";

    } else {
        echo "Email not found in our records.";
    }
}
?>
