<?php
session_start();

if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to login page
    header("Location: login.html");
    exit;
}
?>
