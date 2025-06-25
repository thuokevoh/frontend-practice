<?php
$host = '127.0.0.1';       // You can also use 'localhost'
$db   = 'user_auth';       // Your database name
$user = 'root';            // Default username in XAMPP
$pass = 'maestro';         // The password you set earlier
$charset = 'utf8mb4';      // Modern character set for full Unicode support

// Build the DSN (Data Source Name) string
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options for security and better error handling
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // Fetch results as associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                   // Use real prepared statements (safer)
];

try {
    // Create PDO instance (connect to database)
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Connection successful!";
} catch (PDOException $e) {
    // If connection fails, stop and show error
    die("Connection failed: " . $e->getMessage());
}
?>
