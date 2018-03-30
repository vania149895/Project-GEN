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