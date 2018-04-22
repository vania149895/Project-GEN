function loadDistrict(str)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("district").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/getDistrict.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + str);
    window.city=document.getElementById("city_input").value;
    document.getElementById("district_input").value = "";
    document.getElementById("district_input").disabled = false;
    document.getElementById("street_input").value = "";
    document.getElementById("street_input").disabled = true;
    document.getElementById("number_input").value = "";
    document.getElementById("number_input").disabled = true;
}

function loadStreet(str,str1)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("street").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/getStreet.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("city="+str1+"&district="+str);
    window.district=document.getElementById("district_input").value;
    document.getElementById("street_input").value = "";
    document.getElementById("street_input").disabled = false;
    document.getElementById("number_input").value = "";
    document.getElementById("number_input").disabled = true;
}

function loadHouse(str,str1,str2)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("house").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/getHouse.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("city="+str2+"&district="+str1+"&street="+str);
    window.street=document.getElementById("street_input").value;
    document.getElementById("number_input").value = "";
    document.getElementById("number_input").disabled = false;
}

function loadInfoNoFar(house,street,district,city) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("tableNoFar").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/changeNoFar.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("city=" + city + "&district=" + district + "&street=" + street + "&house=" + house);
}



function getRoomSquere(room)
{
    var rooms = room;
    var one = document.getElementById("1room");
    var two = document.getElementById("2room");
    var three = document.getElementById("3room");
    var four = document.getElementById("4room");
    switch (rooms)
    {
        case "1":
            one.classList.remove("hiden");
            two.classList.add("hiden");
            three.classList.add("hiden");
            four.classList.add("hiden");
            break;
        case "2":
            one.classList.remove("hiden");
            two.classList.remove("hiden");
            three.classList.add("hiden");
            four.classList.add("hiden");
            break;
        case "3":
            one.classList.remove("hiden");
            two.classList.remove("hiden");
            three.classList.remove("hiden");
            four.classList.add("hiden");
            break;
        case "4":
            one.classList.remove("hiden");
            two.classList.remove("hiden");
            three.classList.remove("hiden");
            four.classList.remove("hiden");
            break;
    }
}
function getCloset(closet)
{
    var rooms = closet;
    var one = document.getElementById("sqWC");
    var two = document.getElementById("sqCloset");
    var three = document.getElementById("sqBath");
    switch (rooms)
    {
        case "совмещенный":
            one.classList.remove("hiden");
            two.classList.add("hiden");
            three.classList.add("hiden");
            break;
        case "раздельный":
            one.classList.add("hiden");
            two.classList.remove("hiden");
            three.classList.remove("hiden");
            break;
    }
}

function getCupboard(room)
{
    var rooms = room;
    var one = document.getElementById("sqCupboard");
    switch (rooms)
    {
        case "1":
            one.classList.remove("hiden");
            break;
        case "2":
            one.classList.add("hiden");
            break;
    }
}