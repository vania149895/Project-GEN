
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>GEN | Квартира</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" >
    <script src="script/script.js"></script>
    <script src="js/flat.js"></script>
    <?php include 'script/connect.php'?>
</head>

<body class="container">

<header>
    <div><a href="main.php">PROJECT GEN</a> <p>(ver. 0.3)</p></div>
</header>

<nav>
    <ul class="nav-menu">
        <li><a href="flat.php" class="selected">Квартира</a></li>
        <li><a href="house.php">Дом</a></li>
        <li><a href="dacha.php">Дача</a></li>
        <li><a href="area.php">Участок</a></li>
    </ul>
</nav>

<main>
    <div class="left"></div>
    <div class="work">
        <h4 class="instruct">Что бы создать описание квартиры, заполните все поля и нажмите кнопку сгенерировать.</h4>
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
            <label for="tab5" onclick="result()" title="Генерация описания">Готово</label>

            <section id="content-tab1">
                <h2>Где распологается ваша недвижимость?</h2>
                <div class="flex">
                    <div class="form">
                        <label for="city_input">Город: </label>
                        <input id="city_input" list="city" onchange="loadDistrict(this.value)" placeholder="Выберите город">
                        <datalist id="city">
                            <?php include 'script/getCity.php' ?>
                        </datalist>
                    </div>
                    <div class="form">
                        <label for="district_input">Район: </label>
                        <input id="district_input" list="district" onchange="loadStreet(this.value, window.city)" placeholder="Выберите район" disabled>
                        <datalist id="district">
                            <option>--ГОРОД НЕ ВЫБРАН--</option>
                        </datalist>
                    </div>
                    <div class="form">
                        <label for="street_input">Улица: </label>
                        <input id="street_input" list="street" onchange="loadHouse(this.value, window.district, window.city)" placeholder="Выберите улицу" disabled>
                        <datalist id="street">
                            <option>--РАЙОН НЕ ВЫБРАН--</option>
                        </datalist>
                    </div>
                    <div class="form">
                        <label for="number_input">Номер дома: </label>
                        <input type="text" id="number_input" list="house" placeholder="Введите номер дома" disabled>
                        <datalist id="house">
                            <option>--УЛИЦА НЕ ВЫБРАНА--</option>
                        </datalist>
                    </div>
                </div>
                <h2>Что находится неподалеку?</h2>
                <div class="flex">
                    <div class="form">
                        <u class="min">В 5-ти минутах ходьбы: </u>
                        <?php include 'script/getNoFar.php' ?>
                    </div>
                    <div class="form">
                        <u class="min">В 10-ти минутах ходьбы: </u>
                        <?php include 'script/getNoFar.php' ?>
                    </div>
                    <div class="form">
                        <u class="min">В 15-ти минутах ходьбы: </u>
                        <?php include 'script/getNoFar.php' ?>
                    </div>
                </div>
                <div class="flexButton">
                    <label for="tab1" title="Основные характеристики" class="button">Назад</label>
                    <label for="tab5" onclick="result()" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab2" title="Основные характеристики" class="button">Далее</label>
                </div>
            </section>

            <section id="content-tab2">
                <h2>Общие сведения о недвижимости:</h2>
                <div class="flex">
                    <div class="form">
                        <label for="wall">Материал стен:</label>
                        <select id="wall">
                            <option value="">--Тип стен--</option>
                            <option value="крипич">Кирпичные</option>
                            <option value="панель">Панельные</option>
                            <option value="дерево">Деревянные</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="year">Год постройки:</label>
                        <input id="year" placeholder="Введите год постройки">
                    </div>
                    <div class="form">
                        <label for="rooms">Количество комнат:</label>
                        <select id="rooms" onchange="getRoomSquere(this.value)">
                            <option value="">--Выберите кол-во комнат--</option>
                            <option value="1">Однокомнатная</option>
                            <option value="2">Двукомнатная</option>
                            <option value="3">Трехкомнатная</option>
                            <option value="4">Четырехкомнатная</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="level">Этаж/этажность:</label>
                        <input id="level" placeholder="Введите этаж/этажность">
                    </div>
                    <div class="form">
                        <label for="cupboard">Наличие кладовки:</label>
                        <select id="cupboard" onchange="getCupboard(this.value)">
                            <option value="">--Кладовка--</option>
                            <option value="1">Есть</option>
                            <option value="2">Нет</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="lodgia">Наличие лоджии:</label>
                        <select id="lodgia">
                            <option value="">--Лоджия--</option>
                            <option value="1">Нет</option>
                            <option value="2">1 лоджия</option>
                            <option value="3">2 лоджии</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="San">Санузел:</label>
                        <select id="San" onchange="getCloset(this.value)">
                            <option value="">--Тип санузла--</option>
                            <option value="совмещенный">Совмещенный</option>
                            <option value="раздельный">Раздельный</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="repairs">Состояние ремонта:</label>
                        <select id="repairs">
                            <option value="">--Тип ремонта--</option>
                            <option value="1">Очень плохой</option>
                            <option value="2">Плохой</option>
                            <option value="3">Средний</option>
                            <option value="4">Хороший</option>
                            <option value="5">Очень хороший</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="height">Высота потолков:</label>
                        <input id="height" placeholder="Введитете высоту в м">
                    </div>

                </div>
                <h2>Информация о площади:</h2>
                <div class="flex">
                    <div class="form">
                        <label for="SquereSNB">Площадь по СНБ:</label>
                        <input id="SquereSNB" placeholder="Введитете полощадь в м2">
                    </div>
                    <div class="form">
                        <label for="liveSquere">Жилая площадь:</label>
                        <input id="liveSquere" placeholder="Введитете полощадь в м2">
                    </div>
                    <div class="form">
                        <label for="kitchenSquere">Площадь кухни:</label>
                        <input id="kitchenSquere" placeholder="Введитете полощадь в м2">
                    </div>


                    <div class="form" id="1room">
                        <label for="room1">Площадь 1-ой комнаты:</label>
                        <input id="room1" placeholder="Введитете полощадь в м2">
                    </div>
                    <div class="form hiden" id="2room">
                        <label for="room2">Площадь 2-ой комнаты:</label>
                        <input id="room2" placeholder="Введитете полощадь в м2">
                    </div>
                    <div class="form hiden" id="3room">
                        <label for="room3">Площадь 3-ей комнаты:</label>
                        <input id="room3" placeholder="Введитете полощадь в м2">
                    </div>
                    <div class="form hiden" id="4room">
                        <label for="room4">Площадь 4-ой комнаты:</label>
                        <input id="room4" placeholder="Введитете полощадь в м2">
                    </div>



                    <div class="form" id="sqWC">
                        <label for="wcSq">Площадь cанузла:</label>
                        <input id="wcSq" placeholder="Введитете полощадь в м2">
                    </div>
                    <div class="form hiden" id="sqCloset">
                        <label for="closetSq">Площадь туалета:</label>
                        <input id="closetSq" placeholder="Введитете полощадь в м2" >
                    </div>
                    <div class="form hiden" id="sqBath">
                        <label for="bathSq">Площадь ванной комнаты:</label>
                        <input id="bathSq" placeholder="Введитете полощадь в м2">
                    </div>



                    <div class="form">
                        <label for="hallSq">Площадь прихожей:</label>
                        <input id="hallSq" placeholder="Введитете полощадь в м2">
                    </div>

                    <div class="form hiden" id="sqCupboard">
                        <label for="cupboardSq">Площадь кладовки:</label>
                        <input id="cupboardSq" placeholder="Введитете полощадь в м2">
                    </div>




                </div>
                <div class="flexButton">
                    <label for="tab1" title="Местоположение" class="button">Назад</label>
                    <label for="tab5" onclick="result()" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab3" title="Дополнительные сведения" class="button">Далее</label>
                </div>
            </section>

            <section id="content-tab3">
                <h2>Дополнительная информация о недвижимости:</h2>
                <div class="flex">
                    <div class="form">
                        <label for="rooms">Количество комнат:</label>
                        <select id="rooms">
                            <option value="">--Выберите кол-во комнат--</option>
                            <option value="1">Однокомнатная</option>
                            <option value="2">Двукомнатная</option>
                            <option value="3">Трехкомнатная</option>
                            <option value="4">Четырехкомнатная</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="level">Этаж/этажность:</label>
                        <input id="level" placeholder="Введите этаж/этажность">
                    </div>
                    <div class="form">
                        <label for="San">Санузел:</label>
                        <select id="San">
                            <option value="">--Тип санузла--</option>
                            <option value="1">Раздельный</option>
                            <option value="2">Совмещенный</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="repairs">Состояние ремонта:</label>
                        <select id="repairs">
                            <option value="">--Тип ремонта--</option>
                            <option value="1">Очень плохой</option>
                            <option value="2">Плохой</option>
                            <option value="3">Средний</option>
                            <option value="4">Хороший</option>
                            <option value="5">Очень хороший</option>
                        </select>
                    </div>
                </div>
                <div class="flexButton">
                    <label for="tab2" title="Основные характеристики" class="button">Назад</label>
                    <label for="tab5" onclick="result()" title="Генерация описания" class="button">Сгенерировать</label>
                    <label for="tab4" title="Креатив" class="button">Далее</label>
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
    Project GEN 2018
</footer>

</body>

</html>
