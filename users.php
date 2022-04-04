<?php 
    require 'components/connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<table>

        <tr>
            <td>
                ID
            </td>
            <td>
            login
            </td>
            <td>
              mail
            </td>
            <td>
                password
            </td>
            <td>
                Удалить 
            </td>
        </tr>
        <?php $users = mysqli_query($link, "SELECT * FROM `table1` ");
        while($user = mysqli_fetch_assoc($users)){ ?>
        <tr>
        <td>
            <?= $user['ID'] ?>
            </td>
            <td>
            <?= $user['login'] ?>
            </td>
            <td>
            <?= $user['mail'] ?> 
            </td>
            <td>
            <?= $user['password'] ?>
            </td>
            <td>
            <form class="form-users-delete" action="action/action.php" method="POST">
                <input type="hidden" value="<?= $user['ID']?>" name="id-user" required>

                <input type="submit" value="Удалить пользователя" name="delete-user">
                
            </form>
        </td>
        <td>
       
        </td>
    </tr>   
    
    <?php }?>
</table>
<form class="form-update-delete" action="action/action.php" method="POST">
        <span class="label">login:</span>
        <input type="text" name="login" required>

        <span class="label">mail:</span>
        <input type="text" name="mail" required>
    
        <span class="label">password:</span>
        <input type="text" name="password" required>

        <span class="label">id</span>
        <input type="text" name="id_user" required>

        <input type="submit" value="Обновить" name="update-user">
    </form>

</body>
</html>
<?php
    mysqli_close($link);
?>