<?php 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 

    unset($_SESSION['user']);
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>