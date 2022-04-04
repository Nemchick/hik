<?php
    require '../components/connect.php';
    session_start();





    
//старая регистрация
        if(isset($_POST['submit'])){
            $users = mysqli_query($link, "SELECT * FROM `table1` 
            WHERE `login`= '{$_POST['login']}'");
            if(mysqli_num_rows($users) == 0){
                mysqli_query($link, "INSERT INTO `table1` (`login`, `mail`, `password`) 
                VALUES ('{$_POST['login']}', '{$_POST['mail']}', '{$_POST['password']}')");

                header("location: ../index.php");
                 
            }
        }









//старая авторизация      
        if(isset($_POST['signin'])){
            $users = mysqli_query($link, "SELECT * FROM `table1` WHERE login='{$_POST['login']}'");
$user = mysqli_fetch_assoc($users);
$_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "mail" => $user ['mail'],
        "password" => $user ['password']
    ];

        header("location: ../index.php");
        }










//не работал с этим
        if(isset($_POST['delete-user'])){
            mysqli_query($link, "DELETE FROM `table1` 
            WHERE `ID` = '{$_POST['id-user']}'");
            header("location: ../index.php");
        }
        if(isset($_POST['update-user'])){
            mysqli_query($link, "UPDATE `table1` 
            SET `login`= '{$_POST['login']}', `mail`= '{$_POST['mail']}',
             `password`= '{$_POST['password']}'
            WHERE `ID` = '{$_POST['id_user']}'");
            header("location: ../index.php");
        }
    
        mysqli_close($link);
?>
