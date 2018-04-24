//Функция принимает количество комнат в виде числа и возвращает тектовый вариант
function room(room_numers) {     
    var arr = [["однокомнатная квартира", "квартира с одной комнатой", "однушка"],  //Массив с возможными вар. 
               ["двухкомнатная квартира", "квартира с двумя комнатами", "двушка"],  //описания кв, где первый
               ["трехкомнатная квартира", "квартира с тремя комнатами", "трешка"],  //индекс это кол-во комнат - 1
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
                if(!!city){aboutCity = " в городе " + city.slice(0,city.length-1) + "e"};
                if(!!district){aboutDistrict = ". Район: " + district};
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

//Функция принимает строгу вида ЭТАЖ/ЭТАЖНОСТЬ и строку с типом стен дома и возвращает случайную вариацию их сочетания  
function floor_and_type(floor_of_floors, type){
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
            if(!!level){f_part = level+end+"этаж "};
            if(!!type){s_part = type + "ного "};
            if(!!building_levels){t_part = building_levels + "-и этажного дома"}else{t_part = " дома"};
            break;
        case 2:
            if(!!level){f_part = "Квартира находится на " + level + " этаже "};
            if(!!building_levels){s_part =" из " + building_levels };
            if(!!type){t_part = ". Стены - " + type + "ные"};
            break;
        case 3:
            if(!!level){f_part =""};
            if(!!building_levels){s_part =""};
            if(!!type){t_part =""};
            break;
    }
    if((!f_part && !s_part && !t_part)||(!f_part && !s_part && t_part === "дома"))
        return "";
    return f_part + s_part + t_part + ". ";
}

function Squere_of_rooms(roomsSquere){
    let end = "-ой ";

   return roomsSquere.reduce((res,item,index) => {
       if(index+1 === 3)
           end = "-ей ";
       else
           end = "-ой ";
       !!item?(res+="Площадь "+(index+1)+end+"комнаты равна: "+item+" кв. м. "):(res+="");
       return res;
   },"")
}

function StreetAndHouse(street, n_of_build){
    let n = 3;                                        // количество возможных вариаций
    let rand = Math.floor(1+Math.random()*n);
    let streetPart = "", nPart = "";
    if(!street)
        return "";
    switch(rand){
        case 1:
            if(!!street){streetPart = "Ул. " + street};
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

function result(){
    let city = document.getElementById("city_input").value ;
    let district = document.getElementById("district_input").value ;
    let street = document.getElementById("street_input").value;
    let n_of_build = document.getElementById("number_input").value;
    let type_of_walls = document.getElementById("wall").value;
    let year_of_found = document.getElementById("year").value;
    let n_of_rooms = document.getElementById("rooms").value;
    let floor_of_floors = document.getElementById("level").value;
    let cupboard = document.getElementById("cupboard").value;
    let lodgia = document.getElementById("lodgia").value;
    let bathroom = !!document.getElementById("San").value ? document.getElementById("San").value + " санузел. " : "";
    let repair = document.getElementById("repairs").value;
    let height = !!document.getElementById("height").value ? "Высота потолков : " + document.getElementById("height").value + " м. " : "";
    let SquereSNB = !!document.getElementById("SquereSNB").value ? "Площадь кваритры составляет: " + document.getElementById("SquereSNB").value + " кв. м. " : "";
    let liveSquere = !!document.getElementById("liveSquere").value ? "Жилая площадь: " + document.getElementById("liveSquere").value + " кв. м. " : "";
    let kitchenSquere = !!document.getElementById("kitchenSquere").value ? "Площадь кухни: " + document.getElementById("kitchenSquere").value + " кв. м. " : "";
    let roomsSquere = [document.getElementById("room1").value,
                       document.getElementById("room2").value,
                       document.getElementById("room3").value,
                       document.getElementById("room4").value];   
    let wcSq = !!document.getElementById("wcSq").value ?  "Площадь санузла: " + document.getElementById("kitchenSquere").value + " кв. м. " : "";
    let closetSq = !!document.getElementById("closetSq").value ? "Площадь туалета: " + document.getElementById("closetSq").value + " кв. м. ": "";
    let bathSq = !!document.getElementById("bathSq").value ? "Площадь ванной: " + document.getElementById("bathSq").value + " кв. м. " : "";
    let hallSq = !!document.getElementById("hallSq").value ? "Площадь прихожей: " + document.getElementById("hallSq").value + " кв. м. " : "";
    let cupboardSq = !!document.getElementById("cupboardSq").value ? "Площадь кладовки: " + document.getElementById("cupboardSq").value + " кв. м. " : "";
    let house_info  = document.getElementById("house_info").value;
    let TextArea = document.getElementById("gen_text");
    TextArea.value = room(n_of_rooms) + CityAndDistrict(city,district) +  StreetAndHouse(street,n_of_build) + floor_and_type(floor_of_floors,type_of_walls)+ SquereSNB + liveSquere + Squere_of_rooms(roomsSquere) + kitchenSquere + wcSq + closetSq + bathroom + bathSq + hallSq + cupboardSq + height + house_info;
    
}