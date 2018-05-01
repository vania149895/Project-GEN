<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru" dir="ltr">

<head>
    <title>GEN | Коммерческая недвижимость</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <script src="script/script.js"></script>
    <?php include 'script/connect.php' ?>
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
            <li><a href="com.php" class="selected">Коммерческая </a></li>
        </ul>
    </nav>

    <main>
        <div class="left"></div>
        <div class="work">
            <h4 class="instruct">Что бы создать описание комерческой недвижимости, проследуйте простым указаниям.</h4>
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
                        <input type="radio" name="object" id="office"><label for="office" class="extra">Офис</label>
                        <input type="radio" name="object" id="shop"><label for="shop" class="extra">Тороговое помещение</label>
                        <input type="radio" name="object" id="stock"><label for="stock" class="extra">Склад</label>
                        <input type="radio" name="object" id="factory"><label for="factory" class="extra">Производственное помещение</label>
                    </div>
                    <div class="flexcheck">
                        <input type="radio" name="deal" id="forLong"><label for="forLong" class="extra">Аренда</label>
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
                            <label for="rooms">Количество помещений:</label>
                            <select id="rooms" onchange="getRoomSquere(this.value)">
                                <option value="">--Выберите кол-во комнат--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
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
                            <label for="height">Высота потолков:</label>
                            <input id="height" placeholder="Введитете высоту в м">
                        </div>
                    </div>
                    <h2>Информация о площади:</h2>
                    <div class="flex">
                        <div class="form">
                            <label for="SquereSNB">Общая площадь:</label>
                            <input id="SquereSNB" placeholder="Введитете полощадь в м2">
                        </div>

                        <div class="form" id="1room">
                            <label for="room1">Площадь 1-го помещения:</label>
                            <input id="room1" placeholder="Введитете полощадь в м2">
                        </div>
                        <div class="form hiden" id="2room">
                            <label for="room2">Площадь 2-го помещения:</label>
                            <input id="room2" placeholder="Введитете полощадь в м2">
                        </div>
                        <div class="form hiden" id="3room">
                            <label for="room3">Площадь 3-го помещения:</label>
                            <input id="room3" placeholder="Введитете полощадь в м2">
                        </div>
                        <div class="form hiden" id="4room">
                            <label for="room4">Площадь 4-го помещения:</label>
                            <input id="room4" placeholder="Введитете полощадь в м2">
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
                        <input type="checkbox" id="extra3"><label for="extra3" class="extra">+Водоснабжение</label>
                        <input type="checkbox" id="extra4"><label for="extra4" class="extra">+Газоснабжение</label>
                        <input type="checkbox" id="extra5"><label for="extra5" class="extra">+Электричество</label>
                        <input type="checkbox" id="extra6"><label for="extra6" class="extra">+Охрана</label>
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
