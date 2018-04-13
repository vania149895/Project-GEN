<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" >
    <script src="script/script.js"></script>
    <?php include 'connect.php' ?>
</head>
<body class="container">

<header>
    <div><a href="main.php">PROJECT GEN</a> <p>(ver. 0.3)</p></div>
</header>

<nav >
    <ul class="nav-menu">
        <li><a href="flat.php">Квартира</a></li>
        <li><a href="house.php" class="selected">Дом</a></li>
        <li><a href="dacha.php">Дача</a></li>
        <li><a href="area.php">Участок</a></li>
    </ul>
</nav>

<main>
    <div class="left"></div>
    <div class="work">
        <h4 class="instruct">Что бы создать описание недвижимости, проследуйте простым указаниям.</h4>
        <div class="tabs">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1" title="Данные о расположении">Место</label>

            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" title="Основные характеристики">Общее</label>

            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" title="Доп. сведения">Дополнительно</label>

            <input id="tab4" type="radio" name="tabs">
            <label for="tab4" title="Улучшение описания">Креатив</label>

            <input id="tab5" type="radio" name="tabs">
            <label for="tab5" title="Генерация описания">Готово</label>

            <section id="content-tab1">
                <h2>Где распологается ваша недвижимость?</h2>
                <div class="flex">
                    <div class="form">
                        <label for="city_input">Город: </label>
                        <input id="city_input" list="city" onchange="loadDistrict(this.value)" placeholder="Выберите город">
                        <datalist id="city">
                            <?php include 'getCity.php' ?>
                        </datalist>
                    </div>
                    <div class="form">
                        <label for="district_input">Район: </label>
                        <input id="district_input" list="district" onchange="loadStreet(this.value, window.city)" placeholder="Выберите район">
                        <datalist id="district">
                            <option>--ГОРОД НЕ ВЫБРАН--</option>
                        </datalist>
                    </div>
                    <div class="form">
                        <label for="street_input">Улица: </label>
                        <input id="street_input" list="street" placeholder="Выберите улицу">
                        <datalist id="street">
                            <option>--РАЙОН НЕ ВЫБРАН--</option>
                        </datalist>
                    </div>
                    <div class="form">
                        <label for="number_input">Номер дома: </label>
                        <input type="text" id="number_input" placeholder="Введите номер дома">
                    </div>
                </div>
                <h2>Что находится неподалеку?</h2>
                <div class="flex">
                    <div class="form">
                        <u class="min">В 5-ти минутах ходьбы: </u>
                        <?php include 'getNoFar.php' ?>
                    </div>
                    <div class="form">
                        <u class="min">В 10-ти минутах ходьбы: </u>
                        <?php include 'getNoFar.php' ?>
                    </div>
                    <div class="form">
                        <u class="min">В 15-ти минутах ходьбы: </u>
                        <?php include 'getNoFar.php' ?>
                    </div>
                </div>
                <div class="flexButton">
                    <label for="tab1" title="Основные характеристики" class="button">Назад</label>
                    <label for="tab5" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab2" title="Основные характеристики" class="button">Далее</label>
                </div>
            </section>

            <section id="content-tab2">
                <h2>Общие сведения о недвижимости:</h2>
                <div class="flexButton">
                    <label for="tab1" title="Местоположение" class="button">Назад</label>
                    <label for="tab5" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab3" title="Дополнительные сведения" class="button">Далее</label>
                </div>
            </section>

            <section id="content-tab3">
                <h2>Дополнительная информация о недвижимости:</h2>
                <div class="flexButton">
                    <label for="tab2" title="Основные характеристики" class="button">Назад</label>
                    <label for="tab5" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab4" title="Креатив" class="button">Далее</label>
                </div>
            </section>

            <section id="content-tab4">
                <h2>Креатив для улучшения уникальности описания:</h2>
                <div class="flexButton">
                    <label for="tab3" title="Дополнительные сведения" class="button">Назад</label>
                    <label for="tab5" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab5" title="Генерация описания" class="button">Далее</label>
                </div>
            </section>

            <section id="content-tab5">
                <h2>Нажмите кнопку для генирации описания:</h2>
                <div class="flexButton">
                    <label for="tab4" title="Креатив" class="button">Назад</label>
                    <label for="tab5" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab5" title="Генерация описания" class="button">Далее</label>
                </div>
            </section>
        </div>
    </div>
    <div class="right"></div>
</main>

<footer>
    Project GEN 2018
</footer>

<!--
<div class="grid">
    <div class="grid-item grid-item1">Item 1</div>
    <div class="grid-item grid-item2">Item 2</div>
    <div class="grid-item grid-item3">Item 3</div>
</div>






<nav>
    <ul>
        <li><a href="index_1.php">Project GEN (ver. 0.1)</a></li>
        <li><a href="admin.php">ADMIN</a></li>
    </ul>
</nav>

<nav aria-label="breadcrumb">
    <p> Project GEN (ver.0.1)</p>

    <ul class="breadcrumb">
        <h6>Генератор текстов Ver. 0.1</h6>
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
        <li>ВХОД ДЛЯ АДМИНА</li>

    </ul>
</nav>


<div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Общие характеристики</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Доп. по квартире</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Доп по дому</a>
        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Креатив</a>
    </div>
</div>


<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Привет мой друг!</h1>
        <p class="lead">Это программа была созданна специалльно для тебя, что бы ты смог создать прекрастное описания для своей недвижимости.</p>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="flat.html">Квартиры</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Дома</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Дачи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Участки</a>
        </li>
    </ul>
</div>
<footer>Project GEN by Ivan Borusiuk 2018</footer>-->
</body>
</html>
