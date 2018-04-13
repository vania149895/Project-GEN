
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>Генератор описаний</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/main.css" >

</head>
<?php
session_start();
if(!isset($_SESSION['access']) || $_SESSION['access']!=true){
    header("location:index.php");}
else{ ?>
<body class="container">

<header>
    <div><a href="main.php">PROJECT GEN</a> <p>(ver. 0.3)</p></div>
</header>

<nav>
    <ul class="nav-menu">
        <li><a href="flat.php">Квартира</a></li>
        <li><a href="house.php">Дом</a></li>
        <li><a href="dacha.php">Дача</a></li>
        <li><a href="area.php">Участок</a></li>
    </ul>
</nav>

<main>
    <div class="left"></div>
    <div class="work">
        <div class="hello">
            <h1>Привет мой друг!</h1>
            <p>Это программа была созданна специально для того, что бы ты смог создать прекрастное описания для своей недвижимости.</p>
            <p>Если ты готов начать работу, выбери одну из категорий описываемой недвижимости.</p>
        </div>
        <table class="category" >
            <tr>
                <td align="right">
                    <a href="flat.php"><div class="flat"><p>Квартира</p></div></a>
                </td>
                <td align="left">
                    <a href="house.php"><div class="house"><p>Дом</p></div></a>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <a href="dacha.php"><div class="dacha"><p>Дача</p></div></a>
                </td>
                <td align="left">
                    <a href="area.php"><div class="area"><p>Участок</p></div></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="right"></div>
</main>

<footer>
    <p><a href="admin.php">Project GEN </a> 2018</p>
</footer>

</body>
<?php } ?>
</html>