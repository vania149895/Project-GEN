
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>GEN | Квартира</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" >
    <script src="script/script.js"></script>
    <script src="js/flat.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'script/connect.php'?>
</head>
<?php
session_start();
if(!isset($_SESSION['access']) || $_SESSION['access']!=true){
    header("location:index.php");}?>

<body class="container">

<header>
    <div><a href="main.php"><img src="img/logo.png" width="110px"></a></div>
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
            <label for="tab5" title="Генерация описания">Готово</label>

            <section id="content-tab1">
                <h2>Выбирите объект и цель его описания:</h2>
                <div class="flexcheck">
                    <input type="radio" name="object" id="flat"><label for="flat" class="extra">Квартира</label>
                    <input type="radio" name="object" id="room"><label for="room" class="extra">Комната в квартире</label>
                </div>
                <div class="flexcheck">
                    <input type="radio" name="deal" id="forDay"><label for="forDay" class="extra">Посуточная аренда</label>
                    <input type="radio" name="deal" id="forLong"><label for="forLong" class="extra">Долгосрочная аренда</label>
                    <input type="radio" name="deal" id="Sale"><label for="Sale" class="extra">Продажа</label>
                </div>
                <h2>Где располагается ваша недвижимость?</h2>
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
                        <input id="number_input" list="house" onchange="loadInfoNoFar(this.value, window.street, window.district, window.city)" placeholder="Введите номер дома" disabled>
                        <datalist id="house">
                            <option>--УЛИЦА НЕ ВЫБРАНА--</option>
                        </datalist>
                    </div>
                </div>
                <h2>Что находится неподалеку?</h2>
                <div class="flex" id="tableNoFar">
                    <?php include 'script/getNoFar.php' ?>
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
                        <label for="doorIn">Входная дверь:</label>
                        <select id="doorIn">
                            <option value="">--Входная дверь--</option>
                            <option value="1">Алюминевая</option>
                            <option value="2">Деревянная</option>
                            <option value="3">Пластиковая</option>
                            <option value="4">Стальная</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="doorIn">Межкомнатные двери:</label>
                        <select id="doorIn">
                            <option value="">--Межкомнатные двери--</option>
                            <option value="1">Массив</option>
                            <option value="2">Шпонированые</option>
                            <option value="3">Пластиковые</option>
                            <option value="4">Ламинированное ДСП</option>
                            <option value="5">Стеклянные</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="windows">Окна:</label>
                        <select id="windows">
                            <option value="">--Окна--</option>
                            <option value="1">Пластиковые (ПВХ)</option>
                            <option value="2">Деревянные</option>
                            <option value="3">Металлопластиковые</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="windows">Освещение:</label>
                        <select id="windows">
                            <option value="">--Освещение--</option>
                            <option value="1">Диодное</option>
                            <option value="2">Лампы накаливания</option>
                            <option value="3">Энергосберегающие лампы</option>
                        </select>
                    </div>
                </div>
                <div class="flexcheck">
                    <input type="checkbox" id="extra1"><label for="extra1" class="extra">+Парковка</label>
                    <input type="checkbox" id="extra2"><label for="extra2" class="extra">+Подвал</label>
                    <input type="checkbox" id="extra3"><label for="extra3" class="extra">+Детская площадка</label>
                    <input type="checkbox" id="extra4"><label for="extra4" class="extra">+Новая сантехника</label>
                    <input type="checkbox" id="extra5"><label for="extra5" class="extra">+Приватизированная</label>
                    <input type="checkbox" id="extra6"><label for="extra6" class="extra">+Лоджия застеклена</label>
                    <input type="checkbox" id="extra7"><label for="extra7" class="extra">+Консъерж</label>
                    <input type="checkbox" id="extra8"><label for="extra8" class="extra">+Домофон</label>
                </div>

                <h2>Состояние ремонта:</h2>
                <div class="flex">
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Шикарный">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Хороший">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Средний">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Плохой">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Нужен ремонт">1 star</label>
                    </div>
                </div>

                <h2>Отделка</h2>
                <div class="flex"><h4>ПОТОЛОК:</h4></div>
                <div class="flexcheck">
                    <input type="checkbox" id="up1"><label for="up1" class="extra">+Побелка</label>
                    <input type="checkbox" id="up2"><label for="up2" class="extra">+Краска</label>
                    <input type="checkbox" id="up3"><label for="up3" class="extra">+Обои</label>
                    <input type="checkbox" id="up4"><label for="up4" class="extra">+Потолочная плитка</label>
                    <input type="checkbox" id="up5"><label for="up5" class="extra">+Гипсокартон</label>
                    <input type="checkbox" id="up6"><label for="up6" class="extra">+Натяжной</label>
                </div>
                <div class="flex"><h4>ПОЛ:</h4></div>
                <div class="flexcheck">
                    <input type="checkbox" id="down1"><label for="down1" class="extra">+Ламинат</label>
                    <input type="checkbox" id="down2"><label for="down2" class="extra">+Паркет</label>
                    <input type="checkbox" id="down3"><label for="down3" class="extra">+Плитка</label>
                    <input type="checkbox" id="down4"><label for="down4" class="extra">+Линолеум</label>
                    <input type="checkbox" id="down5"><label for="down5" class="extra">+Ковролин</label>
                </div>
                <div class="flex"><h4>СТЕНЫ:</h4></div>
                <div class="flexcheck">
                    <input type="checkbox" id="wall1"><label for="wall1" class="extra">+Краска</label>
                    <input type="checkbox" id="wall2"><label for="wall2" class="extra">+Обои</label>
                    <input type="checkbox" id="wall3"><label for="wall3" class="extra">+Пробка</label>
                    <input type="checkbox" id="wall4"><label for="wall4" class="extra">+Декоративная штукатурка</label>
                    <input type="checkbox" id="wall5"><label for="wall5" class="extra">+Плитка</label>
                    <input type="checkbox" id="wall6"><label for="wall6" class="extra">+Камень</label>
                </div>

                <h2>Мебель:</h2>
                <div class="flexcheck">
                    <input type="checkbox" id="furniture1"><label for="furniture1" class="extra">+Кухня</label>
                    <input type="checkbox" id="furniture2"><label for="furniture2" class="extra">+Диван</label>
                    <input type="checkbox" id="furniture3"><label for="furniture3" class="extra">+Двуспальная кровать</label>
                    <input type="checkbox" id="furniture4"><label for="furniture4" class="extra">+Кровать</label>
                    <input type="checkbox" id="furniture5"><label for="furniture5" class="extra">+Шкаф</label>
                    <input type="checkbox" id="furniture6"><label for="furniture6" class="extra">+Встроенный шкаф</label>
                    <input type="checkbox" id="furniture7"><label for="furniture7" class="extra">+Стелаж</label>
                    <input type="checkbox" id="furniture8"><label for="furniture8" class="extra">+Комод</label>
                    <input type="checkbox" id="furniture9"><label for="furniture9" class="extra">+Стол обеденный</label>
                    <input type="checkbox" id="furniture10"><label for="furniture10" class="extra">+Стол письменный</label>
                    <input type="checkbox" id="furniture11"><label for="furniture11" class="extra">+Стулья</label>
                    <input type="checkbox" id="furniture12"><label for="furniture12" class="extra">+Кресла</label>
                </div>
                <h2>Бытовая техника:</h2>
                <div class="flexcheck">
                    <input type="checkbox" id="tech1"><label for="tech1" class="extra">+Газовая плита</label>
                    <input type="checkbox" id="tech2"><label for="tech2" class="extra">+Варочная панель</label>
                    <input type="checkbox" id="tech3"><label for="tech3" class="extra">+Стиральная машина</label>
                    <input type="checkbox" id="tech4"><label for="tech4" class="extra">+Холодильник</label>
                    <input type="checkbox" id="tech5"><label for="tech5" class="extra">+Утюг</label>
                    <input type="checkbox" id="tech6"><label for="tech6" class="extra">+Электрочайник</label>
                    <input type="checkbox" id="tech7"><label for="tech7" class="extra">+Микроволновая печь</label>
                    <input type="checkbox" id="tech8"><label for="tech8" class="extra">+Телевизор</label>
                    <input type="checkbox" id="tech9"><label for="tech9" class="extra">+Музыкальный центр</label>
                    <input type="checkbox" id="tech10"><label for="tech10" class="extra">+Телефон</label>
                </div>
                <h2>Прочие удобства:</h2>
                <div class="flexcheck">
                    <input type="checkbox" id="comfort1"><label for="comfort1" class="extra">+Интернет (оптоволкно)</label>
                    <input type="checkbox" id="comfort2"><label for="comfort2" class="extra">+Интернет</label>
                    <input type="checkbox" id="comfort3"><label for="comfort3" class="extra">+Спутниковое ТВ</label>
                    <input type="checkbox" id="comfort4"><label for="comfort4" class="extra">+Кабельное ТВ</label>
                    <input type="checkbox" id="comfort5"><label for="comfort5" class="extra">+WI-FI</label>
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
                    <textarea placeholder="Блестни своей остроумностью, чтобы добавить твоему описанию большей индивидуальности и креатива." id="creative"></textarea>
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
            echo "<a href=\"admin.php\">Админ-панель</a>"?>
        <a href="index.php">Выход</a>
    </div>
</footer>

</body>

</html>
