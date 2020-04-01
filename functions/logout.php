<?php 
session_start();
unset($_SESSION['online']);
header('location:../index.php');
?>