<?php 
    require 'components/connect.php';
    session_start();
    if(!$_SESSION['user']){
        header("location: index.php");
    }
?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<span>Привет, <?= $_SESSION['user']['login']; ?></span>
<a href="action/logout.php" class="t">выход</a>
<p><a href="index.php" class="t">Главная</a></p>
<style> 
.t{
    text-decoration: none;
    color: black;
    transition: color .2s linear;
}

.t:hover{
    color: #ff0000;
}
</style>
<!-- <a href="action/logout.php"></a> -->
 
</body>
</html>