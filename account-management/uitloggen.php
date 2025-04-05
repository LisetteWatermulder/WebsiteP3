<?php
    session_unset();
    session_destroy();
    setcookie('isLoggedIn', false, time() - 3600, '/');
    setcookie('username', '', time() - 3600, '/');
    header('Location: ../index.php');
    exit;
?>