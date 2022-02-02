<?php
    if($_SERVER['SERVER_NAME'] == 'localhost')
        $basepath = '/SistemaMonitoria';
    
    session_start();
    if (!isset($_SESSION['id'])) {
        header('Location: '.$basepath.'/web/index.php');  
    }
    //echo "Welcome to the member's area, " . $_SESSION['nome'] . "!";
    #include("includes/header.php")
?>