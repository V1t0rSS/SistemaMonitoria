<?php
        session_start();
        if (!isset($_SESSION['logado']) == true) {         
            header('Location: ../index.php');    
        }
        //echo "Welcome to the member's area, " . $_SESSION['nome'] . "!";
        #include("includes/header.php")
?>