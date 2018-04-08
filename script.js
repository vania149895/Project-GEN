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