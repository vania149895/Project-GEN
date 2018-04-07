
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>GEN | Квартира</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/main.css" >
    <script src="script.js"></script>
    <?php include 'script/connect.php' ?>

</head>

<body class="container">

<header class="element element-1">
    <div><a href="index.php">PROJECT GEN</a> <p>(ver. 0.1)</p></div>
</header>

<nav class="element element-2">

    <ul class="nav-menu">
        <li><a href="flat.php" class="selected">Квартира</a></li>
        <li><a href="house.php">Дом</a></li>
        <li><a href="dacha.php">Дача</a></li>
        <li><a href="area.php">Участок</a></li>
    </ul>
</nav>

<main class="element element-3">
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
                <h2>Данные о местоположении недвижимости:</h2>
                <div class="form">
                    <label for="city_input">Выберите город: </label>
                    <input type="text" id="city_input" list="city" onchange="load(this.value)" placeholder="Выберите город">
                    <datalist id="city">
                        <?php include 'script/getCity.php' ?>
                    </datalist>
                </div>
                <div class="form">
                    <label for="district_input">Выберите район: </label>
                    <input type="text" id="district_input" list="district">
                    <datalist id="district">
                        <option>ГОРОД НЕ ВЫБРАН</option>
                    </datalist>
                </div>



            </section>

            <section id="content-tab2">
                <h2>Общие сведения о недвижимости:</h2>
            </section>

            <section id="content-tab3">
                <h2>Дополнительная информация о недвижимости:</h2>
            </section>

            <section id="content-tab4">
                <h2>Креатив для улучшения уникальности описания:</h2>
            </section>

            <section id="content-tab5">
                <h2>Нажмите кнопку для генирации описания:</h2>
            </section>
        </div>
    </div>
    <div class="right"></div>
</main>

<footer class="element element-4">
    Project GEN by Ivan Borusiuk 2018
</footer>

</body>

</html>
