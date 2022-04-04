<?php 
    session_start();
    require_once("components/connect.php");
?>
<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!<a href='aut.php'>повторить попытку</a>");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $result = mysqli_query($link, "SELECT * FROM table1 WHERE login='$login'"); 
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    exit ("Извините, введённый вами логин или пароль неверный.<a href='aut.php'>повторить попытку</a>");
    }
    else {
    if ($myrow['password']==$password) {
    $_SESSION['login']=$myrow['login']; 
    header('location: index.php');
    }
    else {
    exit ("Извините, введённый вами логин или пароль неверный.<a href='aut.php'>назад</a>");
    }
    }


    // if(isset($_POST['login'])){

    //     $login = mysqli_real_escape_string($link, $_POST['login']);

    //     $users = mysqli_query($link, "SELECT * FROM `users` WHERE login='$login' AND password='$pass'");

    //     $current_time=time(); //Не будем вызывать ф-цию много раз.

    //     //Нет таких идентификаторов - получите
    //     if (!isset($_SESSION['user_blocked_time'])) $_SESSION['user_blocked_time']=0;
    //     if (!isset($_SESSION['try'])) $_SESSION['try']=0;

    //     //Есть что? А если найду?
    //     if (isset($_SESSION['user_blocked_time']))
    //     {
    //     if ($_SESSION['user_blocked_time']>$current_time) {Echo 'Вы заблокированы.<a href="aut.php">назад</a>'; exit;}
    //     if ($_SESSION['user_blocked_time']<$current_time) $_SESSION['user_blocked_time']=0;
    //     }

    //     if(mysqli_num_rows($users)>=1){
    //         $user = mysqli_fetch_assoc($users); 
    //         $_SESSION['user'] = [
    //             "login" => $user['login']
    //         ];
    //     } else {

    //     if ($_SESSION['try']>=3) {Echo 'Вы заблокированы.<a href="aut.php">назад</a>'; exit;}
    //     if ($_SESSION['try']<3) 
    //     {
    //     $_SESSION['try']++;
    //     if ($_SESSION['try']>=3) {$_SESSION['user_blocked_time']=$current_time+20; Echo 'Вы заблокированы.<a href="aut.php">назад</a>'; exit;}
    //     }
    //     exit ('Извините, введённый вами логин или пароль неверный.<a href="aut.php">назад</a>');
    //     }
    //     header('location: index.php');
    // }
?>