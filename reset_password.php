<?php
require 'db_connect.php';

$token = $_GET['token'] ?? '';

if (!$token) {
    die("❌ Invalid reset link. No token provided.");
}


$stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ?");
$stmt->execute([$token]);
$reset = $stmt->fetch();

if (!$reset) {
    die("<p>❌ Token not found in the database.</p>");
}

// Check expiration
if (strtotime($reset['expires_at']) < time()) {
    die("<p>❌ Token is expired. Expired at: " . htmlspecialchars($reset['expires_at']) . "</p>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="auth.css" />
</head>
<body>
  <div class="auth-container">
    <h2>Reset Password</h2>
    <form action="update_password.php" method="POST">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
      <label>New Password</label>
      <input type="password" name="new_password" required>
      <button type="submit">Update Password</button>
    </form>
    <p>
      <a href="login.html">Back to Login</a>
    </p>
  </div>
</body>
</html>
