<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}

$currentUsername = $_SESSION['user'];

// Get current user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$currentUsername]);
$user = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newUsername = $_POST['username'] ?? '';
    $newEmail = $_POST['email'] ?? '';
    $newPassword = $_POST['password'] ?? '';

    // Only update password if it's filled
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE username = ?");
        $stmt->execute([$newUsername, $newEmail, $hashedPassword, $currentUsername]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE username = ?");
        $stmt->execute([$newUsername, $newEmail, $currentUsername]);
    }

    $_SESSION['user'] = $newUsername; // Update session
    echo "Profile updated successfully!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
<h2>Edit Your Profile</h2>
<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

    <label>New Password (leave blank to keep current):</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Update Profile</button>
</form>
</body>
</html>
