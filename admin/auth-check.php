<?php
session_start();

// For demo purposes, we consider user_id 1 as Admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    if ($current_page !== 'login.php') {
        $return_to = urlencode($_SERVER['REQUEST_URI']);
        header("Location: ../login.php?redirect=$return_to");
        exit();
    }
}
?>
