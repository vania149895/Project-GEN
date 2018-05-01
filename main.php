<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>Генератор описаний</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<?php
session_start();
if(!isset($_SESSION['access']) || $_SESSION['access']!=true){
    header("location:index.php");}?>

<body class="container">

    <header>
        <div><a href="main.php"><img src="img/logo.png" width="130px"></a></div>
    </header>
    <nav>
        <ul class="nav-menu">
            <li><a href="flat.php">Квартиры</a></li>
            <li><a href="house.php">Дома</a></li>
            <li><a href="com.php">Коммерческая </a></li>
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
            <div class="flex category">
                <a href="flat.php"><div class="flat"><p>Квартира</p></div></a>
                <a href="house.php"><div class="house"><p>Дом</p></div></a>
                <a href="com.php"><div class="com"><p>Коммерческая </p></div></a>
            </div>
        </div>
        <div class="right"></div>
    </main>

    <footer>
        <div class="info">
            <p>©Project GEN - уникальная программа для генерации описания недвижимости.</p>
        </div>
        <div class="href">
            <?php
            if ($_SESSION['admin']==true)
                echo "<a href=\"admin.php\">Админ-панель</a>"?>
            <a href="index.php">Выход</a>
        </div>
    </footer>
</body>
</html>