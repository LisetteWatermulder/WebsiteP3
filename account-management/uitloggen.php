<?php
    session_start();
    // Store lastPage in URL parameter
    $lastPage = isset($_SESSION['currentPage']) ? $_SESSION['currentPage'] : 'index.php';
    session_unset();
    session_destroy();
    setcookie('isLoggedIn', false, time() - 3600, '/');
    setcookie('username', '', time() - 3600, '/');
    header('Location: ../' . $lastPage);
    exit;
?>