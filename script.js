function loadDistrict(str)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("district").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "getDistrict.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + str);
    window.city=document.getElementById("city_input").value;
    document.getElementById("district_input").value = "";
    document.getElementById("street_input").value = "";
    document.getElementById("number_input").value = "";
}

function loadStreet(str,str1)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("street").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "getStreet.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("city="+str1+"&district="+str);
    document.getElementById("street_input").value = "";
    document.getElementById("number_input").value = "";
}

function getRoomSquere(room)
{
    let rooms = room;
    console.log(room);
    let one = document.getElementById("1room");
    let two = document.getElementById("2room");
    let three = document.getElementById("3room");
    let four = document.getElementById("4room");
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