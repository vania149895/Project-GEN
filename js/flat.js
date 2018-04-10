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

function city(city){
    if(city[city.length-1] === "а")
        return city.slice(0,city.length-1) + "e";
    return city+"е"
}

function floor_and_type(floor_of_floors, type){
    let building_levels = 0;
    let level = 0;
    let stop_index = 0;
    let stop_simbols = ["/",".",",","_","|","-"," "];
    stop_simbols.map(item => {if(floor_of_floors.indexOf(item)>-1) stop_index = floor_of_floors.indexOf(item)});
    level = floor_of_floors.slice(0,stop_index);
    building_levels = floor_of_floors.slice(stop_index+1,floor_of_floors.length)
    return "на "+level +" этаже "+type+" "+building_levels+"-и этажного дома";
}