<?php 
    session_start();
    require_once("components/connect.php");
?>
<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) 
    {
    exit ("Заполните все поля!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $result = mysqli_query($link, "SELECT id FROM table1 WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $result2 = mysqli_query ($link, "INSERT INTO table1 (`login`, `password`) VALUES ('$login','$password')");
    if ($result2=='TRUE')
    {
    header('location: index.php');
    }
    else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
?>