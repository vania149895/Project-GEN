<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>GEN | Админ-панель</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/main.css" >
    <script src="script/scriptAdmin.js"></script>
    <script src="script/script.js"></script>
    <?php include 'script/connect.php'; ?>
</head>
<?php
session_start();
if($_SESSION['access']!=true || $_SESSION['admin']!= true){
    header("location:index.php");}?>

    <body class="container">

    <header>
        <div><a href="main.php"><img src="img/logo.png" width="110px"></a></div>
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
            <h4 class="instruct">Добро пожаловать в админ-панель генератора описаний недвижимости! Для тонкой настройки ресурса, выберите один из пунктов меню:</h4>
            <div class="tabs">
                <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1" title="Главное меню">Меню</label>

                <input id="tab2" type="radio" name="tabs">
                <label for="tab2" title="Пользователи">Пользователи</label>

                <input id="tab3" type="radio" name="tabs">
                <label for="tab3" title="Города, районы, улицы...">Места</label>

                <input id="tab4" type="radio" name="tabs">
                <label for="tab4" title="Прочие параметры">Прочее</label>

                <input id="tab5" type="radio" name="tabs">
                <label for="tab5" title="Генерация описания">Генератор</label>

                <section id="content-tab1">
                    <h2>Выберите редактируемый раздел сайта:</h2>
                    <div class="flex" id="tableDB">
                    </div>
                    <div class="flexButtonAdmin">
                        <label for="tab2" title="База пользователей" id="Admin" class="button">Пользователи</label>
                        <label for="tab3" title="Города, районы, улицы" id="Admin" class="button">Места</label>
                        <label for="tab4" title="Прочие настройки" id="Admin" class="button">Прочее</label>
                        <label for="tab5" title="Параметры генерации" id="Admin" class="button">Генератор</label>
                        <label for="tab1" title="Исправить таблицы БД" id="Admin" class="button" onclick="createTableDB()">Исправить таблицы БД</label>
                    </div>
                </section>

                <section id="content-tab2">
                    <h2>Информация о пользователях ресурса:</h2>
                    <div class="flex" id="usersInfo">
                        <?php include 'script/usersInfo.php'?>
                    </div>
                    <h2>Добавление пользователя:</h2>
                    <div class="flex">
                        <div class="form">
                            <label for="user_input">Имя пользователя: </label>
                            <input id="user_input" placeholder="User">
                        </div>
                        <div class="form">
                            <label for="password_input">Пароль: </label>
                            <input id="password_input" placeholder="Password">
                        </div>
                        <div class="form">
                            <label for="admin_input">Права администратора: </label>
                            <input type="checkbox" id="admin_input">
                        </div>
                        <div class="form">
                            <input type="submit" value="Добавить" onclick="addUser()">
                        </div>
                    </div>
                    <div class="flexButton">
                        <label for="tab1" title="Главное меню" class="button">Назад</label>
                        <label for="tab1"  title="Главное меню" class="button">Меню</label>
                        <label for="tab3" title="Города, районы, улицы" class="button">Далее</label>
                    </div>
                </section>

                <section id="content-tab3">
                    <h2>Выберите категорию изменяемых данных:</h2>
                    <div class="flex">
                        <div class="form">
                            <select id="info" onchange="setInfo(this.value)">
                                <option value="0">--Категория--</option>
                                <option value="1">Города</option>
                                <option value="2">Районы</option>
                                <option value="3">Улицы</option>
                                <option value="4">Дома</option>
                                <option value="5">Сведения о домах</option>
                            </select>
                        </div>
                    </div>
                    <h2 class="hiden" id="setInfoHead">Уточните информацию:</h2>
                    <div class="flex hiden" id="setInfo">
                        <div class="form hiden" id="cityForm">
                            <label for="city_input">Город: </label>
                            <input id="city_input" list="city" onchange="loadDistrict(this.value)" placeholder="Выберите город">
                            <datalist id="city">
                                <?php include 'script/getCity.php' ?>
                            </datalist>
                        </div>
                        <div class="form hiden" id="districtForm">
                            <label for="district_input">Район: </label>
                            <input id="district_input" list="district" onchange="loadStreet(this.value, window.city)" placeholder="Выберите район" disabled>
                            <datalist id="district">
                                <option>--ГОРОД НЕ ВЫБРАН--</option>
                            </datalist>
                        </div>
                        <div class="form hiden" id="streetForm">
                            <label for="street_input">Улица: </label>
                            <input id="street_input" list="street" onchange="loadHouse(this.value, window.district, window.city)" placeholder="Выберите улицу" disabled>
                            <datalist id="street">
                                <option>--РАЙОН НЕ ВЫБРАН--</option>
                            </datalist>
                        </div>
                        <div class="form hiden" id="houseForm">
                            <label for="number_input">Номер дома: </label>
                            <input type="text" id="number_input" list="house" placeholder="Введите номер дома" disabled>
                            <datalist id="house">
                                <option>--УЛИЦА НЕ ВЫБРАНА--</option>
                            </datalist>
                        </div>
                    </div>
                    <div class="flexButtonAdmin hiden" id="button">
                        <label title="Показать таблицу" id="Admin" class="button" onclick="showTable()">Показать</label>
                    </div>
                    <h2 class="hiden" id="placeHead">Информация о местах:</h2>
                    <div class="flex hiden" id="place">
                        <p>Заполните требуемые поля и нажмите кнопку показать</p>
                    </div>
                    <h2 class="hiden" id="addPlaceHead">Добавление записи:</h2>
                    <div class="flex hiden" id="addPlace">
                        <div class="form">
                            <input id="namePlace" placeholder="Название">
                            <input type="submit" value="Добавить" onclick="addPlace()">
                        </div>
                    </div>
                    <div class="flexButton">
                        <label for="tab2" title="Пользователи" class="button">Назад</label>
                        <label for="tab1" title="Главное меню" class="button">Меню</label>
                        <label for="tab4" title="Прочие настройки" class="button">Далее</label>
                    </div>
                </section>

                <section id="content-tab4">
                    <h2>Креатив для улучшения уникальности описания:</h2>
                    <div class="flex">
                        <div class="form1">
                            <?php include 'script/getCreative.php' ?>
                        </div>
                    </div>
                    <div class="flexButton">
                        <label for="tab3" title="Дополнительные сведения" class="button">Назад</label>
                        <label for="tab5" onclick="result()" title="Генерация описания" class="button">Сгенерировать</label>
                        <label for="tab5" title="Генерация описания" class="button">Далее</label>
                    </div>
                </section>

                <section id="content-tab5">
                    <h2>Нажмите кнопку для генирации описания:</h2>
                    <textarea placeholder="Здесь сгенерируется идеальное и неповоторимое описание вашей недвижимости." id="gen_text"></textarea>
                    <div class="flexButton">
                        <label for="tab4" title="Креатив" class="button">Назад</label>
                        <label for="tab5" onclick="result()" title="Генерация описания" class="button">Сгенерировать</label>
                        <label for="tab5" title="Генерация описания" class="button">Далее</label>
                    </div>
                </section>
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
                echo "<a href=\"admin.php\" class='selected'>Админ-панель</a>"?>
            <a href="index.php">Выход</a>
        </div>
    </footer>

    </body>

</html>