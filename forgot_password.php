<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <link rel="stylesheet" href="auth.css" />
</head>
<body>
  <div class="auth-container">
    <h2>Forgot Password</h2>
    <form action="send_reset_link.php" method="POST">
      <label for="email">Email</label>
      <input type="email" name="email" required />
      <button type="submit">Send Reset Link</button>
    </form>
    <p>
      <a href="login.html">Back to Login</a>
    </p>
  </div>
</body>
</html>

