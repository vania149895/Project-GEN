//Функция принимает количество комнат в виде числа и возвращает текcтовый вариант 
function Room(room_numers){ 
    let is_office = document.getElementById("office");
    let is_shop = document.getElementById("shop");
    let is_stock = document.getElementById("stock");
    let is_factory = document.getElementById("factory");
    let arr_for_office = [["однокомнатный офис", "офис с одной комнатой"], 
                          ["двухкомнатный офис", "офис с двумя комнатами"], 
                          ["трехкомнатный офис", "офис с тремя комнатами"]];
    
    let arr_for_shop = [["однокомнотное торговое помещение", "торговое помещение с одной комнатой"], 
                        ["двухкомнотное торговое помещение", "торговое помещение с двумя комнатами"], 
                        ["трехкомнотное торговое помещение", "торговое помещение с тремя комнатами"]];
    
    let arr_for_stock = [["однокомнатный склад", "склад с одной комнатой"], 
                          ["двухкомнатный склад", "склад с двумя комнатами"], 
                          ["трехкомнатный склад", "склад с тремя комнатами"]];
    
    let arr_for_factory = [
        ["однокомнотное производственное помещение", "производственное помещение с одной комнатой"], 
        ["двухкомнотное производственное помещение", "производственное помещение с двумя комнатами"], 
        ["трехкомнотное производственное помещение", "производственное помещение с тремя комнатами"]];
    let rand = 0;
    let arr = [];
    if(is_office.checked)
        arr = arr_for_office;
    else if(is_shop.checked)
        arr = arr_for_shop;
    else if(is_stock.checked)
        arr = arr_for_stock;
    else if(is_factory.checked)
        arr = arr_for_factory;
    else 
        return "";
    if(!room_numers && is_office.checked)
        return "офис";
    else if(!room_numers && is_shop.checked)
        return "торговое помещение";
    else if(!room_numers && is_stock.checked)
        return "склад";
    else if(!room_numers && is_factory.checked)
        return "производственное помещение";
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
    let stop_index = 0;                       //переменной
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
            if(!!type){
                if(type[type.length-1] == "о")
                    type = type.slice(0,type.length-1) + "ян";
                s_part = type + "ного "};
            if(!!building_levels){t_part = building_levels + "-и этажного здания"}else{t_part = " здания"};
            break;
        case 2:
            if(!!level){f_part = "Помещене находится на " + level + " этаже "};
            if(!!building_levels){s_part ="из " + building_levels };
            if(!!type){
                if(type[type.length-1] == "о")
                    type = type.slice(0,type.length-1) + "ян";
                t_part = ". Стены - " + type + "ные"};
            break;
    }
    if((!f_part && !s_part && !t_part)||(!f_part  && !s_part && t_part === " здания"))
        return "";
    return f_part + s_part + t_part + ". ";
}

//Функция принимает улицу и номер дома и возвращает  случайную вариацию их сочетания
function StreetAndHouse(street, n_of_build){
    let is_shop = document.getElementById("shop");
    let is_factory = document.getElementById("factory");
    let n = 3;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let streetPart = "", nPart = "", end = "";
    if(!street)
        return "";
    if(is_shop.checked || is_factory.checked)
        end = "о";
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
            if(!!street){streetPart = "Расположен" + end + " на улице " + street};
            if(!!n_of_build){nPart = ", дом " + n_of_build};
            break;
    }
    if(!streetPart && !nPart)
        return "";
    return streetPart + nPart + ". ";
}

//Функция определяет какой чекбокс, сведетельствующий о типе сделки выделен
function TypeOfDeal(){
    let long = document.getElementById("forLong");
    let sale = document.getElementById("Sale");
    if(long.checked)
        return "в аренду сдается ";
    else if(sale.checked)
        return "продается ";
    else 
        return "";
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

//Функция определяет какие чекбоксы отмеченые в дополнительной информации о доме и возвращет строку с их учетом 
function ExtraInfo(){
    let extra_info = [];
    let res = "";
    for(let i = 0; i < 6; i++){
        extra_info[i] = document.getElementById("extra"+(i+1));
    }
    if(extra_info[0].checked)
        res+="Имеется парковка. ";
    if(extra_info[1].checked)
        res+="Есть подвал. ";
    if(extra_info[2].checked)
        res+="Есть водоснабжение. ";
    if(extra_info[3].checked)
        res+="Есть газоснабжение. ";
    if(extra_info[4].checked)
        res+="Электричество проведено. ";
    if(extra_info[5].checked)
        res+="Здание находится под охраной. ";
    return res;
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
            return "В здании стоят хорошие пластиковые(ПВХ) окна. ";
        case 2:
            return "В здании стоят деревянные окна. ";
        case 3:
            return "В здании установленны металлопластикавые окна. ";
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
            return "Освещение в помещении - диодное. ";
        case 2:
            return "В качестве освещаения в помещении используюстя лампы накаливания. ";
        case 3:
            return "Освещают помещение энергосбеергающие лампы. ";
        default :
            return "";
    }
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

//Функция принимает год постройки дома и возвращает  случайную вариацию информации о годе постройки
function YearOfFoundation(year){
    let n = 4;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    if(!year)
        return "";
    switch(rand){
        case 1: 
            return "Здание было построено в " + year + " году. ";
        case 2:
            return "Здание " + year + "-ого года постройки. ";
        case 3:
            return "Само здание было построено в " + year + " году. ";
        case 4:
            return "Год постройки -  " + year + ". ";
    }
}

//Функция принимает число(1, 2, 3, 4, 5) и возвращает строку о состоянии дома
function QualityOfRepair(repair_value){
    switch(repair_value){
        case 1:
            return "Плохое состояние ремонта. ";
            break;
        case 2:
            return "Не самый лучший ремонт. ";
            break;
        case 3:
            return "Неплохой ремнот. ";
            break;
        case 4:
            return "Хороший ремонт. ";
            break;
        case 5:
            return "Отличный ремонт. ";
            break;
        default:
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


function result(){
    let city = document.getElementById("city_input").value ;
    let district = document.getElementById("district_input").value ;
    let street = document.getElementById("street_input").value;
    let n_of_build = document.getElementById("number_input").value;
    let type_of_walls = document.getElementById("wall").value;
    let year_of_found = document.getElementById("year").value;
    let n_of_rooms = document.getElementById("rooms").value;
    let floors = document.getElementById("level").value;
    let repair = GetRepairValue();
    let squere_snb = !!document.getElementById("SquereSNB").value ? "Общая площадь : " + document.getElementById("SquereSNB").value + " м. " : "";
    let rooms_squere = [document.getElementById("room1").value,
                        document.getElementById("room2").value,
                        document.getElementById("room3").value,
                        document.getElementById("room4").value];  
    let area_info  = document.getElementById("house_info").value;
    let height = !!document.getElementById("height").value ? "Высота потолков : " + document.getElementById("height").value + " м. " : "";
    let text_area = document.getElementById("gen_text");
    let text_creative = document.getElementById("creative").value;
    let decoration_info = CeilingDecorationInfo() + FloorDecorationInfo() + WallDecorationInfo();
    let enter_door = +document.getElementById("EnterDoor").value;
    let in_door = +document.getElementById("doorIn").value;
    let windows = +document.getElementById("windows").value;
    let light = +document.getElementById("light").value;
    
    text_area.value = TypeOfDeal() + Room(n_of_rooms) + CityAndDistrict(city,district) + 
    StreetAndHouse(street,n_of_build) + area_info + FloorAndType(floors,type_of_walls) + 
    YearOfFoundation(year_of_found) + QualityOfRepair(repair) + squere_snb + 
    SquereOfRooms(rooms_squere) + height + EnterDoorInfo(enter_door) + InDoorInfo(in_door) + WindowsInfo(windows) + LightInfo(light) + ExtraInfo() + decoration_info + text_creative;
    
    text_area.value = text_area.value[0].toUpperCase() + text_area.value.slice(1,text_area.value.length);
}