<?php
		session_start();
		if (isset($_SESSION['id'])) {         
            header('Location: ./admin/dashboard.php');    
        }
        //echo "Welcome to the member's area, " . $_SESSION['nome'] . "!";
        #include("includes/header.php")
?>