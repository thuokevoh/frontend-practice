<!-- forgot_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
</head>
<body>
  <h2>Reset Your Password</h2>
  <form action="send_reset_link.php" method="POST">
    <label for="email">Enter your email:</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Send Reset Link</button>
  </form>
</body>
</html>
