function room(room_numers) {
    var arr = [["однокомнатная квартира", "квартира с одной комнатой", "однушка"],
               ["двухкомнатная квартира", "квартира с двумя комнатами", "двушка"],
               ["трехкомнатная квартира", "квартира с тремя комнатами", "трешка"],
        [],
        []];
    var rand = Math.round(Math.random()*arr[room_numers-1].length);
    if(rand > arr[room_numers-1].length-1)
        rand-=1;
    return arr[room_numers-1][rand];
}

function getCity(city){
    if(city[city.length-1] === "а")
        return city.slice(0,city.length-1) + "e";
    return city+"е"
}

function floor_and_type(floor_of_floors, type = "панельного"){
    let building_levels = 0;
    let level = 0;
    let stop_index = 0;
    let stop_simbols = ["/",".",",","_","|","-"," "];
    stop_simbols.map(item => {if(floor_of_floors.indexOf(item)>-1) stop_index = floor_of_floors.indexOf(item)});
    level = floor_of_floors.slice(0,stop_index);
    building_levels = floor_of_floors.slice(stop_index+1,floor_of_floors.length)
    return "на "+level +" этаже "+type+" "+building_levels+"-и этажного дома";
}

function Squere_of_rooms(roomsSquere){
    console.log(roomsSquere);
   return roomsSquere.reduce((res,item,index) => {!!item?(res+="Площадь "+(index+1)+"-ой комнаты равна: "+item+" кв. м. "):(res+="");
return res;
},"")
}



function result(){
    let city = document.getElementById("city_input").value;
    let district = document.getElementById("district_input").value;
    let street = document.getElementById("street_input").value;
    let n_of_build = document.getElementById("number_input").value;
    let type_of_walls = document.getElementById("wall").value;
    let year_of_found = document.getElementById("year").value;
    let n_of_rooms = document.getElementById("rooms").value;
    let floor_of_floors = document.getElementById("level").value;
    let cupboard = document.getElementById("cupboard").value;
    let lodgia = document.getElementById("lodgia").value;
    let bathroom = !!document.getElementById("San").value ? document.getElementById("San").value + "санузел. " : "";
    let repair = document.getElementById("repairs").value;
    let height = !!document.getElementById("height").value ? "Высота потолков : " + document.getElementById("height").value + " м.";
    let SquereSNB = !!document.getElementById("SquereSNB").value ? "Площадь кваритры составляет: " + document.getElementById("SquereSNB").value + " кв. м. " : "";
    let liveSquere = !!document.getElementById("liveSquere").value ? "Жилая площадь: " + document.getElementById("liveSquere").value + " кв. м. " : "";
    let kitchenSquere = !!document.getElementById("kitchenSquere").value? "Площадь кухни: " + document.getElementById("kitchenSquere").value + " кв. м. " : "";
    let roomsSquere = [document.getElementById("room1").value,document.getElementById("room2").value,document.getElementById("room3").value,document.getElementById("room4").value];   
    let wcSq = !!document.getElementById("wcSq").value ?  "Площадь санузла: " + document.getElementById("kitchenSquere").value + " кв. м. " : "";
    let closetSq = !!document.getElementById("closetSq").value ? "Площадь туалета: " + document.getElementById("closetSq").value + " кв. м. ": "";
    let bathSq = !!document.getElementById("bathSq").value ? "Площадь ванной: " + document.getElementById("bathSq").value + " кв. м. " : "";
    let hallSq = !!document.getElementById("hallSq").value ? "Площадь прихожей: " + document.getElementById("hallSq").value + " кв. м. " : "";
    let cupboardSq = !!document.getElementById("cupboardSq").value ? "Площадь кладовки: " + document.getElementById("cupboardSq").value + " кв. м. " : "";
    let TextArea = document.getElementById("gen_text");
    TextArea.value = room(n_of_rooms) + " в городе " + getCity(city) + " расположенная в районе " + district + 
        ", " + street+" " + n_of_build + ". " + floor_and_type(floor_of_floors,type_of_walls+"ного") + ", " + 
        year_of_found + "-ого года постройки. " + SquereSNB + liveSquere  + Squere_of_rooms(roomsSquere) +
        kitchenSquere + wcSq + closetSq + bathroom + bathSq + hallSq + cupboardSq + height;
}