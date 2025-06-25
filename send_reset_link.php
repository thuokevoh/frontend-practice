<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    // 1. Check if the email exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // 2. Generate a unique token
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", time() + 3600); // expires in 1 hour

        // 3. Store token and expiry in a table
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expires]);

        // 4. Simulate sending the reset link
        $resetLink = "http://localhost:8000/reset_password.php?token=$token";
        echo "A password reset link has been sent to your email.<br>";
        echo "<a href='$resetLink'>$resetLink</a>";
    } else {
        echo "Email not found in our records.";
    }
}
?>
