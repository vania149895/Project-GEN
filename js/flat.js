//Функция принимает количество комнат в виде числа и возвращает тектовый вариант
function Room(room_numers){     
    var arr = [["Однокомнатная квартира", "Квартира с одной комнатой", "Однушка"],  //Массив с возможными вар. 
               ["Двухкомнатная квартира", "Квартира с двумя комнатами", "Двушка"],  //описания кв, где первый
               ["Трехкомнатная квартира", "Квартира с тремя комнатами", "Трешка"],  //индекс это кол-во комнат
        [],                                                                         //а второй вариация 
        []];
    var rand = "";
    if(!room_numers)
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
    let n = 3;                                        // количество возможных вариаций
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
        case 3:
            if(!!level){f_part =""};
            if(!!building_levels){s_part =""};
            if(!!type){t_part =""};
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
function CupboardInfo (cupboard, cupboardSq){
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
function LodgiaInfo (lodgia_value){
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
    }
}

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

function BathroomInfo(bathroom,wc_squere, closet_squere, bathroom_squere){
    let n = 2;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n); 
    let p_one = "",
        p_two = "";
    if(!bathroom || bathroom === "совмещенный"){
        if(!wc_squere)
            return "Свомещенный санузел. ";
        else
            return "Свомещенный санузел общей площадью " + wc_squere + " кв. м. ";
    }
    else if(bathroom === "раздельный"){
        if(!!closet_squere){p_one = "туалетом площадью " + closet_squere + " кв. м. "}
        if(!!bathroom){p_two = "ванной площадью " + bathroom_squere + " кв. м. "}
        if(!!closet_squere && !!bathroom)
            return "Раздельный санузел c " + p_one + "и " + p_two;
        else if(!!closet_squere || !!bathroom)
            return "Раздельный санузел c " + p_one + p_two;
        else
            return "Раздельный санузел";
    }
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
    let repair = +document.getElementById("repairs").value;
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
    let house_info  = document.getElementById("house_info").value;
    //----------СДЕЛАНО---------------------------
    let height = !!document.getElementById("height").value ? "Высота потолков : " + document.getElementById("height").value + " м. " : "";
    let kitchenSquere = !!document.getElementById("kitchenSquere").value ? "Площадь кухни: " + document.getElementById("kitchenSquere").value + " кв. м. " : ""; 
    let hallSq = !!document.getElementById("hallSq").value ? "Площадь прихожей: " + document.getElementById("hallSq").value + " кв. м. " : "";
    let text_area = document.getElementById("gen_text");
    console.info(bathroom);
    text_area.value = Room(n_of_rooms) + CityAndDistrict(city,district) +  
    StreetAndHouse(street,n_of_build) + FloorAndType(floor_of_floors,type_of_walls) + 
    YearOfFoundation(year_of_found) + CupboardInfo(cupboard,cupboardSq) + 
    LodgiaInfo(lodgia) + QualityOfRepair(repair) + SquereInfo(squere_snb,live_squere) + 
    SquereOfRooms(rooms_squere) + BathroomInfo(bathroom,wc_squere, closet_squere, bathroom_squere) + 
    kitchenSquere + hallSq + height + house_info;
}