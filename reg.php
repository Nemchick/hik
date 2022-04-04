<!-- <form class="form-reg" action="action/action.php" method="POST">
        <span class="label">login:<span>
        <input type="text" name="login" required>

        <span class="label">mail:</span>
        <input type="email" name="mail" required>

        <span class="label">password:</span>
        <input type="text" name="password" required>

        <input type="submit" value="Регистрация" name="submit">
    </form> -->

    <?php 
    session_start();
    require_once("components/connect.php");
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
<?php
    if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])){
?>
        <div id="form_register">
            <h2>Регистрация</h2>
            <form action="registr.php" method="post">
                <table>
                    <tbody>
                    <tr>
                        <td> Логин: </td>
                        <td>
                            <input type="text" name="login" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td> Пароль: </td>
                        <td>
                            <input type="password" name="password" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="index.php">Главная</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>
<?php
    }
?>
</body>
</html>