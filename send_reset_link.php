<?php
require 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Link Sent</title>
  <link rel="stylesheet" href="auth.css" />
  <style>
    .long-link {
      word-break: break-all;
      overflow-wrap: anywhere;
      display: inline-block;
      background-color: #f9f9f9;
      padding: 8px;
      border-radius: 5px;
      color: #007bff;
      text-decoration: none;
    }
    .auth-container {
      max-width: 100%;
      overflow-wrap: anywhere;
    }
  </style>
</head>
<body>
  <div class="auth-container">
    <h2>Reset Link Sent</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';

        // Check if email exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date("Y-m-d H:i:s", time() + 3600);

            $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
            $stmt->execute([$email, $token, $expires]);

            $resetLink = "http://localhost:8000/reset_password.php?token=$token";

            echo "<div class='message success'>";
            echo "A password reset link has been sent to your email.<br><br>";
            echo "<a href='$resetLink'>$resetLink</a>";
            echo "</div>";
        } else {
            echo "<div class='message error'>Email not found in our records.</div>";
        }
    }
    ?>
    <p>
      <a href="login.html">Back to Login</a>
    </p>
  </div>
</body>
</html>