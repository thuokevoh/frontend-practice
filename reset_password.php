<?php
require 'db_connect.php';

$token = $_GET['token'] ?? '';

if (!$token) {
    die("❌ Invalid reset link. No token provided.");
}

// DEBUG: show token we received from URL
echo "<p><strong>Token received from URL:</strong> " . htmlspecialchars($token) . "</p>";

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

echo "<p>✅ Token is valid and not expired!</p>";
echo "<p>Email associated with this token: " . htmlspecialchars($reset['email']) . "</p>";

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