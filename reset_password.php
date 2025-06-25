<?php
require 'db_connect.php';

// Get token from the URL
$token = $_GET['token'] ?? '';

if (!$token) {
    die("Invalid reset link.");
}

// Check if the token exists and is not expired
$stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()");
$stmt->execute([$token]);
$reset = $stmt->fetch();

if (!$reset) {
    die("Invalid or expired token.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="update_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label>New Password:</label><br>
        <input type="password" name="new_password" required><br><br>
        <button type="submit">Update Password</button>
    </form>
</body>
</html>
