<?php

include 'script/connect.php';
global $link;
session_start();
session_unset();
session_destroy();
?>

<html>
<head>
    <title>Доступ ограничен</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/main.css" >
</head>

<body class="passback">

<div class="log">
    <h1>Добро пожаловать в генератор описаний недвижимости!</h1>
    <p>Для того чтобы воспользоваться программой, пожалуйста авторизируйтесь в системе.</p>
</div>

<div class="log">
    <div class="window">
        <h2>Введите логин и пароль:</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="User">
            <input type="password" name="paswd" placeholder="Password">
            <input type="submit" name="submit">
        </form>
        <?php
        if( isset($_POST['submit']) )
        {
            if(!empty($_POST['user']) && !empty($_POST['paswd']))
            {
                $sql="SELECT * FROM users WHERE (user='$_POST[user]')";
                $result=mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    if($_POST['paswd']==$row['password'])
                    {
                        session_start();
                        $_SESSION['access'] = true;
                        if ($row['admin'] == '1')
                            $_SESSION['admin'] = true;
                        else
                            $_SESSION['admin'] = false;
                        header("Location: main.php");
                    }
                    else
                        echo "<p class='alert'>*Неверный пароль<p>";
                }
                else
                    echo "<p class='alert'>*Пользователь не найден<p>";
            }
            else
                echo "<p class='alert'>*Заполните все поля<p>";
        }
        ?>
    </div>
</div>


<div class="log">
    <a href="https://bugrealt.by"> <img src="img/logo.png" width="45%"></a>
</div>




</body>
