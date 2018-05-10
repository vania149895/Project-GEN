//Функция принимает количество комнат в виде числа и возвращает текcтовый вариант 
function Room(room_numers){ 
    let is_room = document.getElementById("room");  //две переменные для того чтобы понять квартира или комната
    let is_flat = document.getElementById("flat");
    let arr_for_flat = [["однокомнатная квартира", "квартира с одной комнатой", "однушка"], 
                        ["двухкомнатная квартира", "квартира с двумя комнатами", "двушка"], 
                        ["трехкомнатная квартира", "квартира с тремя комнатами", "трешка"],];
    
    let arr_for_room = [["комната в однокомнатной квартире", "комната в квартире с одной комнатой", "комната в однушке"], 
                        ["комната в двухкомнатной квартире", "комната в квартире с двумя комнатами", "комната в двушке"], 
                        ["комната в трехкомнатной квартире", "комната в квартире с тремя комнатами", "комната в трешке"],];
    let rand = 0;
    let arr = [];
    if(is_room.checked)
        arr = arr_for_room;
    else if(is_flat.checked)
        arr = arr_for_flat;
    else 
        arr = arr_for_flat;
    if(!room_numers && is_flat.checked)
        return "квартира";
    else if(!room_numers && is_room.checked)
        return "комната";
    else if(!room_numers)
        return "";
    rand = Math.round(Math.random()*arr[room_numers-1].length);
    if(rand > arr[room_numers-1].length-1)
        rand-=1;
    return arr[room_numers-1][rand];
}

//Функция принимает город и район, пример : Брест, Вулька, и возвращает случайную вариацию их сочетания 
function CityAndDistrict(city,district){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let aboutCity = "", aboutDistrict = "";
    switch(rand){
        case 1:
            if(city[city.length-1] === "а"){
                if(!!city){aboutCity = " в городе " + city.slice(0,city.length-1) + "e"}; //учитываем что какя-
                if(!!district){aboutDistrict = ". Район: " + district};                 //то из переменых пустая
            }else{
                if(!!city){aboutCity = " в городе " + city + "e"};
                if(!!district){aboutDistrict = ". Район: " + district};
            }
            break;
        case 2:
            if(!!city){aboutCity = ", г. " + city};
            if(!!district){aboutDistrict = ", р. " + district};
            break;
    }
    if(!aboutCity && !aboutDistrict)
        return "";
    return aboutCity + aboutDistrict + ". ";
}

//Функция принимает строку вида ЭТАЖ/ЭТАЖНОСТЬ и строку с типом стен дома и возвращает случайную вариацию их сочетания  
function FloorAndType(floor_of_floors, type){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let building_levels = 0;
    let level = 0;
    let f_part ="", s_part = "", t_part = ""; //Переменные для того чтобы избежать ошибок при переданной пустой     
                                              //переменной
    let stop_index = 0;
    let stop_simbols = ["/",".",",","_","|","-"," "];  //знаки которыми можно отделить этаж от их количества
    let end = "";                               //переменная для правильного окончания этажей
    stop_simbols.map(item => {if(floor_of_floors.indexOf(item)>-1) stop_index = floor_of_floors.indexOf(item)});
    if(stop_index === 0){
        level = floor_of_floors;
        building_levels = "";
    }
    else{
        level = floor_of_floors.slice(0,stop_index);
        building_levels = floor_of_floors.slice(stop_index+1,floor_of_floors.length)
    }
    if(level % 10 == 3 )
        end = "-ий ";
    else if (level % 10 == 2 || level % 10 == 6 || level % 10 == 7 || level % 10 == 8)
        end = "-ой "
    else 
        end = "-ый "
    switch(rand){
        case 1:
            if(!!level){f_part = level+end+"этаж "};       //учитываем что какя-то из переменых пустая
            if(!!type){s_part = type + "ного "};
            if(!!building_levels){t_part = building_levels + "-и этажного дома"}else{t_part = " дома"};
            break;
        case 2:
            if(!!level){f_part = "Квартира находится на " + level + " этаже "};
            if(!!building_levels){s_part ="из " + building_levels };
            if(!!type){t_part = ". Стены - " + type + "ные"};
            break;
    }
    if((!f_part && !s_part && !t_part)||(!f_part  && !s_part && t_part === " дома"))
        return "";
    return f_part + s_part + t_part + ". ";
}

//Функция принимает массив из площадей комнат и возвращает в случайном порядке либо "Площадь n-ой комнаты : ..." либо "Площадь комнат: ... , ..."
function SquereOfRooms(roomsSquere){
    let end = "-ой ";
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let output = "";
    switch(rand){
        case 1:
            output = roomsSquere.reduce((res,item,index) => {
               if(index+1 === 3)
                   end = "-ей ";
               else
                   end = "-ой ";
               !!item?(res+="Площадь "+(index+1)+end+"комнаты равна: "+item+" кв. м. "):(res+="");
               return res;
           },"");
            break;
        case 2:
             output = roomsSquere.reduce((res,item,index) => {
               !!item?(res+=item+" кв. м. ,"):(res+="");
               return res;
           },"Площадь комнат : ");
              output = output.slice(0,output.length-1);  //убараю запятую у последнего элемента
            break;
    }
    if(output == "Площадь комнат :")
        return "";
    return output;
}

//Функция принимает улицу и номер дома и возвращает  случайную вариацию их сочетания
function StreetAndHouse(street, n_of_build){
    let n = 3;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let streetPart = "", nPart = "";
    if(!street)
        return "";
    switch(rand){
        case 1:
            if(!!street){streetPart = "ул. " + street};   //учитываем что какя-то из переменых пустая
            if(!!n_of_build){nPart = ", д. "+n_of_build};
            break;
        case 2:
            if(!!street){streetPart = " на улице " + street};
            if(!!n_of_build){nPart = "Дом " + n_of_build}
                else{streetPart = streetPart[1].toUpperCase() + streetPart.slice(2,streetPart.length); };
            return nPart + streetPart + ". ";
        case 3: 
            if(!!street){streetPart = "Расположенна на улице " + street};
            if(!!n_of_build){nPart = ", дом " + n_of_build};
            break;
    }
    if(!streetPart && !nPart)
        return "";
    return streetPart + nPart + ". ";
}

//Функция принимает год постройки дома и возвращает  случайную вариацию информации о годе постройки
function YearOfFoundation(year){
    let n = 4;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    if(!year)
        return "";
    switch(rand){
        case 1: 
            return "Дом был построен в " + year + " году. ";
        case 2:
            return "Дом " + year + "-ого года постройки. ";
        case 3:
            return "Сам дом был построен в " + year + " году. ";
        case 4:
            return "Год постройки -  " + year + ". ";
    }
}

//Функция принимает число(1 - есть кладовка, 2 - нет) и площадь кладовки, возвращает строку с введенными данными
function CupboardInfo(cupboard, cupboardSq){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let part_one = "",
        part_two = "";
    if(!cupboard)               //Если переменная означающая 
        return "";
    if(cupboard === 2)
        return "Кладовки нет";
    switch(rand){
        case 1:
            part_one = "Имееется кладовка";
            if(!!cupboardSq){part_two = ", площадью " + cupboardSq + " кв. м"};
            break;
        case 2:
            part_one = "В квартире есть кладовка";
            if(!!cupboardSq){part_two = " площадь которой " + cupboardSq + " кв. м"};
    }
    return part_one + part_two + ". ";
}

//Функция принимает число (1, 2, 3) и возвращает строку, говорящую о наличии лоджии
function LodgiaInfo(lodgia_value){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    switch(rand){
        case 1: 
            if(lodgia_value === 1)
                return "Лоджии в квартире не имеется. ";
            else if(lodgia_value === 2)
                return "В квартире имеется одна лоджия. ";
            else if(lodgia_value === 3)
                return "В квартире имеется две лоджии. ";
            break;
        case 2: 
            if(lodgia_value === 1)
                return "Квартира без балконов.";
            else if(lodgia_value === 2)
                return "В квартире есть один балкон. ";
            else if(lodgia_value === 3)
                return "В квартире есть два балкона. ";
            break;
    }
    return "";
}

//Функция обробатывает количество нажатых чекбоксов(звезд) и возвращает число от 1 до 5, сведетельствующие о состоянии ремонта
function GetRepairValue (){
    let repair_arr = [];
    let res = -1;
    for(let i = 0; i < 5; i++){
        repair_arr[i] = document.getElementById("star"+(i+1));
    }
    repair_arr.forEach((item, index) =>{if(item.checked) res = index+1;});
    return res;
}

//Функция принимает число(1, 2, 3, 4, 5) и возвращает строку о состоянии квартиры
function QualityOfRepair(repair_value){
    switch(repair_value){
        case 1:
            return "Кваритра находится в плохом состоянии. ";
            break;
        case 2:
            return "Кваритра находится не в самом лучшем состоянии. ";
            break;
        case 3:
            return "Кваритра находится в неплохом состоянии. ";
            break;
        case 4:
            return "Кваритра находится в хорошем состоянии. ";
            break;
        case 5:
            return "Кваритра находится в отличном состоянии. ";
            break;
        default:
            return "";
    }
}

//Функция принимает значения площади по СНБ и жилой площади и возвращает строку с учетом этих данных, учитывается вариант когда одна из площадей не указана
function SquereInfo(squere_snb, live_squere){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let snb_part = "",
        live_part = "";
    switch(rand){
        case 1:
            if(!!squere_snb){snb_part = "Площадь по СНБ: " + squere_snb + " кв. м. "};
            if(!!live_squere){live_part = "Жилая площадь: " + live_squere + "кв. м. " };
            break;
        case 2:
            if(!!squere_snb){snb_part = "Нормативная площадь составляет " + squere_snb + " кв. м."};
            if(!!live_squere){live_part = ", из которох " + live_squere + " кв. м. являются жилыми. "};
            break;
    }
    return snb_part + live_part;
}

//Функция принимает значения типа санузла и относящихся к нему площадей и возвращает строку с учетом этих данных, учитывается вариант когда одна из площадей не указана, при пустом значении типа санузла выводится пустая строка
function BathroomInfo(bathroom,wc_squere, closet_squere, bathroom_squere){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n); 
    let p_one = "",
        p_two = "";
    if(bathroom === "совмещенный"){
        if(!wc_squere)
            return "Свомещенный санузел. ";
        else
            return "Свомещенный санузел общей площадью " + wc_squere + " кв. м. ";
    }
    else if(bathroom === "раздельный"){
        if(!!closet_squere){p_one = "туалетом площадью " + closet_squere + " кв. м. ";}
        if(!!bathroom_squere){p_two = "ванной площадью " + bathroom_squere + " кв. м. ";}
        if(!!closet_squere && !!bathroom_squere)
            return "Раздельный санузел c " + p_one + "и " + p_two;
        else if(!!closet_squere || !!bathroom_squere)
            return "Раздельный санузел c " + p_one + p_two;
        else
            return "Раздельный санузел. ";
    }
    return "";
}

//Функция определяет какой чекбокс, сведетельствующий о типе сделки выделен
function TypeOfDeal(){
    let day = document.getElementById("forDay");
    let long = document.getElementById("forLong");
    let sale = document.getElementById("Sale");
    if(day.checked)
        return "в посуточную аренду сдается ";
    else if(long.checked)
        return "в длительную аренду сдается ";
    else if(sale.checked)
        return "продается ";
    else 
        return "";
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации о доме и возвращет строку с их учетом 
function ExtraInfo(){
    let extra_info = [];
    let res = "";
    for(let i = 0; i < 8; i++){
        extra_info[i] = document.getElementById("extra"+(i+1));
    }
    if(extra_info[0].checked)
        res+="Имеется личная парковка. ";
    if(extra_info[1].checked)
        res+="В вашем распоряжении будет подвал. ";
    if(extra_info[2].checked)
        res+="У дома есть детская площадка. ";
    if(extra_info[3].checked)
        res+="В квартире вся сантехника новая. ";
    if(extra_info[4].checked)
        res+="Квартира приватизирована. ";
    if(extra_info[5].checked)
        res+="Все лоджии застеклены. ";
    if(extra_info[6].checked)
        res+="В доме есть консъерж. ";
    if(extra_info[7].checked)
        res+="Также дом оснащен домофоном. ";
    return res;
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации об отделке потолка и возвращет строку с их учетом 
function CeilingDecorationInfo(){
    let res = GetAllChecked("up","ceiling_item");
    if(!res)
        return "";
    return "Материалы отделки потолка: " + res;
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации об отделке стен и возвращет строку с их учетом 
function WallDecorationInfo(){
    let res = GetAllChecked("wall","wall_item");
    if(!res)
        return "";
    return "Материалы отделки стен: " + res;
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации об отделке пола и возвращет строку с их учетом 
function FloorDecorationInfo(){
    let res = GetAllChecked("down","floor_item");
    if(!res)
        return "";
    return "Материалы отделки пола: " + res;
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации о мебели и возвращет строку с их учетом 
function FurnitureInfo(){
    let res = GetAllChecked("furniture","furniture_item");
    if(!res)
        return "";
    return "Из мебели в квартире есть: " + res;
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации о технике в квартире и возвращет строку с их учетом 
function TechInfo(){
    let res = GetAllChecked("tech","tech_item");
    if(!res)
        return ""; 
    return "Бытовая техника в квартире: " + res;
}

//Функция определяет какие чекбоксы отмеченые в дополнительной информации об удобствах в квартире и возвращет строку с их учетом 
function ComfortInfo(){
    let res = GetAllChecked("comfort","comfort_item");
    if(!res)
        return ""; 
    return "Удобства в квартире: " + res;
}

//Функция определяет какое значение выбрано в типе входной двери 
function EnterDoorInfo(door_value){
    if(!door_value)
        return "";
    switch(door_value){
        case 1:
            return "Алюминивая входная дверь. ";
        case 2:
            return "Деревянная входная дверь. ";
        case 3:
            return "Пластиковая входная дверь. ";
        case 4:
            return "Стальная входная дверь. ";
        default :
            return "";
    }
}

//Функция определяет какое значение выбрано в типе межкомнатных дверей
function InDoorInfo(door_value){
    if(!door_value)
        return "";
    switch(door_value){
        case 1:
            return "Межкомнатные двери сделанны из массива. ";
        case 2:
            return "Шпонированные межкомнатыне двери. ";
        case 3:
            return "Межкомнатные двери - пластиковые. ";
        case 4:
            return "Межкомнатные двери сделаны из ламинированного ДСП. ";
        case 5:
            return "Стеклянные межкомнатные двери. ";
        default :
            return "";
    }
}

//Функция определяет какое значение выбрано в типе окон 
function WindowsInfo(window_value){
    if(!window_value)
        return "";
    switch(window_value){
        case 1:
            return "В квартире стоят хорошие пластиковые(ПВХ) окна. ";
        case 2:
            return "В квартире стоят деревянные окна. ";
        case 3:
            return "В квартире установленны металлопластикавые окна. ";
        default :
            return "";
    }
}

//Функция определяет какое значение выбрано в типе освещения
function LightInfo(light_value){
    if(!light_value)
        return "";
    switch(light_value){
        case 1:
            return "Освещение в квартире - диодное. ";
        case 2:
            return "В качестве освещаения в квартире используюстя лампы накаливания. ";
        case 3:
            return "Освещают квартиру энергосбеергающие лампы. ";
        default :
            return "";
    }
}

//Функция принимает id инпутов для чекбоксов и класс лэйблов. Далее проверяет какие лэйблы были отмечены и возвращает строку со всеми нажатыми лэймлами через запятую и с точкой на конце.
function GetAllChecked(input_id, label_class){
    let input_array = [],
        label_array = [];
    let res = "";
    let k = 0;
    let i = 0;
    do{
        input_array[i] = document.getElementById(input_id+(i+1));
        i++;
    }while(!!input_array[i-1]);
    input_array.pop();
    label_array = [...document.getElementsByClassName(label_class)];
    for(let i = 0; i < 5; i++){
        if(input_array[i].checked)
            k = 1;
    }
    if(k === 0)
        return "";
    for(let i = 0; i < input_array.length; i++){
        if(input_array[i].checked)
            res+=(label_array[i].innerHTML).slice(1,label_array[i].innerHTML.length).toLocaleLowerCase() + ", ";
    }
    res = res.slice(0, res.length-2) + ". ";
    return res;
}

//Главная функция которая собирает все переменные и производит генерацию
function result(){
    let city = document.getElementById("city_input").value ;
    let district = document.getElementById("district_input").value ;
    let street = document.getElementById("street_input").value;
    let n_of_build = document.getElementById("number_input").value;
    let type_of_walls = document.getElementById("wall").value;
    let year_of_found = document.getElementById("year").value;
    let n_of_rooms = document.getElementById("rooms").value;
    let floor_of_floors = document.getElementById("level").value;
    let cupboard = document.getElementById("cupboard").value;     //кладовка
    let cupboardSq = document.getElementById("cupboardSq").value;
    let lodgia = +document.getElementById("lodgia").value;           //балкон
    let repair = GetRepairValue();
    let squere_snb = document.getElementById("SquereSNB").value;
    let live_squere = document.getElementById("liveSquere").value;
    let rooms_squere = [document.getElementById("room1").value,
                        document.getElementById("room2").value,
                        document.getElementById("room3").value,
                        document.getElementById("room4").value];  
    let bathroom = document.getElementById("San").value;
    let wc_squere = document.getElementById("wcSq").value;
    let closet_squere = document.getElementById("closetSq").value;
    let bathroom_squere = document.getElementById("bathSq").value;
    let area_info  = document.getElementById("house_info").value;
    let height = !!document.getElementById("height").value ? "Высота потолков : " + document.getElementById("height").value + " м. " : "";
    let kitchenSquere = !!document.getElementById("kitchenSquere").value ? "Площадь кухни: " + document.getElementById("kitchenSquere").value + " кв. м. " : ""; 
    let hallSq = !!document.getElementById("hallSq").value ? "Площадь прихожей: " + document.getElementById("hallSq").value + " кв. м. " : "";
    let text_area = document.getElementById("gen_text");
    let text_creative = document.getElementById("creative").value;
    let decoration_info = CeilingDecorationInfo() + FloorDecorationInfo() + WallDecorationInfo();
    let enter_door = +document.getElementById("EnterDoor").value;
    let in_door = +document.getElementById("doorIn").value;
    let windows = +document.getElementById("windows").value;
    let light = +document.getElementById("light").value;
    
    text_area.value = TypeOfDeal() + Room(n_of_rooms) + CityAndDistrict(city,district) +  
    StreetAndHouse(street,n_of_build) + area_info + FloorAndType(floor_of_floors,type_of_walls) + 
    YearOfFoundation(year_of_found) + CupboardInfo(cupboard,cupboardSq) + 
    LodgiaInfo(lodgia) + QualityOfRepair(repair) + SquereInfo(squere_snb,live_squere) + 
    SquereOfRooms(rooms_squere) + BathroomInfo(bathroom,wc_squere, closet_squere, bathroom_squere) + 
    kitchenSquere + hallSq + height + EnterDoorInfo(enter_door) + InDoorInfo(in_door) + WindowsInfo(windows) + LightInfo(light) + ExtraInfo() + decoration_info + FurnitureInfo() + TechInfo() + ComfortInfo() +
    text_creative;
    
    text_area.value = text_area.value[0].toUpperCase() + text_area.value.slice(1,text_area.value.length);
}