<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../app/controllers/AuthController.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../app/views/login.php');
    exit();
}

header("Location: ../app/views/dashboard.php");
exit();
?>
