<?php 
    session_start();
    require_once("components/connect.php");
?>
<?php
    unset($_SESSION['login']);
    session_destroy();
    header('location: index.php');
?>