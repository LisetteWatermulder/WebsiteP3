<?php
    session_start();
    // Store lastPage in URL parameter
    $lastPage = isset($_SESSION['currentPage']) ? $_SESSION['currentPage'] : 'index.php';
    session_unset();
    session_destroy();
    header('Location: ../' . $lastPage);
    exit;
?>