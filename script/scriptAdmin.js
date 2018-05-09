function createTableDB() {
    if (confirm("Это приведет к удалению всех данных. Вы уверены что хотите исправить таблицы?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("tableDB").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "script/createTableDB.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }
}
function addUser() {
    $user = document.getElementById("user_input").value;
    $password = document.getElementById("password_input").value;
    $admin = document.getElementById("admin_input").checked;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("usersInfo").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/addUser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user=" + $user + "&password=" + $password + "&admin=" + $admin);
    document.getElementById("user_input").value='';
    document.getElementById("password_input").value='';
    document.getElementById("admin_input").checked=0;
}

function deleteUser($id) {
    if (confirm("Вы уверены что хотите удалить пользователя?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("usersInfo").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "script/deleteUser.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + $id);
    }
}
function saveUser($id) {
    $user = document.getElementById("user"+$id).value;
    $password = document.getElementById("password"+$id).value;
    $admin = document.getElementById("admin"+$id).checked;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("usersInfo").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/saveUser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + $id+"&user=" + $user + "&password=" + $password + "&admin=" + $admin);
}
function showTable() {
    var info = document.getElementById("info").value;
    var city = document.getElementById("city_input").value;
    var district = document.getElementById("district_input").value;
    var street = document.getElementById("street_input").value;
    var house = document.getElementById("number_input").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("place").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/showPlace.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("info="+ info +"&city=" + city + "&district=" + district + "&street=" + street + "&house=" + house);
}

function setInfo($val) {
    var setInfoHead = document.getElementById("setInfoHead");
    var setInfo = document.getElementById("setInfo");
    var cityForm = document.getElementById("cityForm");
    var districtForm = document.getElementById("districtForm");
    var streetForm = document.getElementById("streetForm");
    var houseForm = document.getElementById("houseForm");
    var button = document.getElementById("button");
    var placeHead = document.getElementById("placeHead");
    var place = document.getElementById("place");
    var addPlaceHead = document.getElementById("addPlaceHead");
    var addPlace = document.getElementById("addPlace");

    switch ($val){
        case '0':
            setInfoHead.classList.add("hiden");
            setInfo.classList.add("hiden");
            cityForm.classList.add("hiden");
            districtForm.classList.add("hiden");
            streetForm.classList.add("hiden");
            houseForm.classList.add("hiden");
            button.classList.add("hiden");
            placeHead.classList.add("hiden");
            place.classList.add("hiden");
            addPlaceHead.classList.add("hiden");
            addPlace.classList.add("hiden");
            document.getElementById("city_input").value = "";
            document.getElementById("district_input").value = "";
            document.getElementById("district_input").disabled = true;
            document.getElementById("street_input").value = "";
            document.getElementById("street_input").disabled = true;
            document.getElementById("number_input").value = "";
            document.getElementById("number_input").disabled = true;
            break;
        case '1':
            showTable();
            setInfoHead.classList.add("hiden");
            setInfo.classList.add("hiden");
            cityForm.classList.add("hiden");
            districtForm.classList.add("hiden");
            streetForm.classList.add("hiden");
            houseForm.classList.add("hiden");
            button.classList.add("hiden");
            placeHead.classList.remove("hiden");
            place.classList.remove("hiden");
            addPlaceHead.classList.remove("hiden");
            addPlace.classList.remove("hiden");
            document.getElementById("city_input").value = "";
            document.getElementById("district_input").value = "";
            document.getElementById("district_input").disabled = true;
            document.getElementById("street_input").value = "";
            document.getElementById("street_input").disabled = true;
            document.getElementById("number_input").value = "";
            document.getElementById("number_input").disabled = true;
            break;
        case '2':
            setInfoHead.classList.remove("hiden");
            setInfo.classList.remove("hiden");
            cityForm.classList.remove("hiden");
            districtForm.classList.add("hiden");
            streetForm.classList.add("hiden");
            houseForm.classList.add("hiden");
            button.classList.remove("hiden");
            placeHead.classList.remove("hiden");
            place.classList.remove("hiden");
            addPlaceHead.classList.remove("hiden");
            addPlace.classList.remove("hiden");
            document.getElementById("city_input").value = "";
            document.getElementById("district_input").value = "";
            document.getElementById("district_input").disabled = true;
            document.getElementById("street_input").value = "";
            document.getElementById("street_input").disabled = true;
            document.getElementById("number_input").value = "";
            document.getElementById("number_input").disabled = true;
            break;
        case '3':
            setInfoHead.classList.remove("hiden");
            setInfo.classList.remove("hiden");
            cityForm.classList.remove("hiden");
            districtForm.classList.remove("hiden");
            streetForm.classList.add("hiden");
            houseForm.classList.add("hiden");
            button.classList.remove("hiden");
            placeHead.classList.remove("hiden");
            place.classList.remove("hiden");
            addPlaceHead.classList.remove("hiden");
            addPlace.classList.remove("hiden");
            document.getElementById("city_input").value = "";
            document.getElementById("district_input").value = "";
            document.getElementById("district_input").disabled = true;
            document.getElementById("street_input").value = "";
            document.getElementById("street_input").disabled = true;
            document.getElementById("number_input").value = "";
            document.getElementById("number_input").disabled = true;
            break;
        case '4':
            setInfoHead.classList.remove("hiden");
            setInfo.classList.remove("hiden");
            cityForm.classList.remove("hiden");
            districtForm.classList.remove("hiden");
            streetForm.classList.remove("hiden");
            houseForm.classList.add("hiden");
            button.classList.remove("hiden");
            placeHead.classList.remove("hiden");
            place.classList.remove("hiden");
            addPlaceHead.classList.remove("hiden");
            addPlace.classList.remove("hiden");
            document.getElementById("city_input").value = "";
            document.getElementById("district_input").value = "";
            document.getElementById("district_input").disabled = true;
            document.getElementById("street_input").value = "";
            document.getElementById("street_input").disabled = true;
            document.getElementById("number_input").value = "";
            document.getElementById("number_input").disabled = true;
            break;
        case '5':
            setInfoHead.classList.remove("hiden");
            setInfo.classList.remove("hiden");
            cityForm.classList.remove("hiden");
            districtForm.classList.remove("hiden");
            streetForm.classList.remove("hiden");
            houseForm.classList.remove("hiden");
            button.classList.remove("hiden");
            placeHead.classList.remove("hiden");
            place.classList.remove("hiden");
            addPlaceHead.classList.remove("hiden");
            addPlace.classList.remove("hiden");
            document.getElementById("city_input").value = "";
            document.getElementById("district_input").value = "";
            document.getElementById("district_input").disabled = true;
            document.getElementById("street_input").value = "";
            document.getElementById("street_input").disabled = true;
            document.getElementById("number_input").value = "";
            document.getElementById("number_input").disabled = true;
            break;
    }
}

function deletePlace(id) {
    var info = document.getElementById("info").value;
    var city = document.getElementById("city_input").value;
    var district = document.getElementById("district_input").value;
    var street = document.getElementById("street_input").value;
    var house = document.getElementById("number_input").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("place").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/deletePlace.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("info="+ info +"&city=" + city + "&district=" + district + "&street=" + street + "&house=" + house + "&id=" + id);
}

function changeCat(set, id) {
    var info = document.getElementById("info").value;
    var city = document.getElementById("city_input").value;
    var district = document.getElementById("district_input").value;
    var street = document.getElementById("street_input").value;
    var house = document.getElementById("number_input").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("place").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/changeCat.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("set="+set+"&info="+info+"&city=" + city + "&district=" + district + "&street=" + street + "&house=" + house + "&id=" + id);
}
function changeInfo(id) {
    var info = document.getElementById("info").value;
    var city = document.getElementById("city_input").value;
    var district = document.getElementById("district_input").value;
    var street = document.getElementById("street_input").value;
    var house = document.getElementById("number_input").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("place").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/changeInfo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("info="+info+"&city=" + city + "&district=" + district + "&street=" + street + "&house=" + house + "&id=" + id);
}

function addPlace() {
    var info = document.getElementById("info").value;
    var city = document.getElementById("city_input").value;
    var district = document.getElementById("district_input").value;
    var street = document.getElementById("street_input").value;
    var house = document.getElementById("number_input").value;
    var str = document.getElementById("namePlace").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("place").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/addPlace.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("info="+ info +"&city=" + city + "&district=" + district + "&street=" + street + "&house=" + house + "&str=" + str);
    document.getElementById("namePlace").value='';

}
function addCreative() {
    $creative = document.getElementById("creative_input").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("creativeInfo").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/addCreative.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("creative=" + $creative);
    document.getElementById("creative_input").value='';
}
function deleteCreative($id) {
    if (confirm("Вы уверены что хотите удалить значение?")) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("creativeInfo").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "script/deleteCreative.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + $id);
    }
}
function saveCreative($id) {
    $creative = document.getElementById("creative"+$id).value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("creativeInfo").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "script/saveCreative.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + $id+"&creative=" + $creative);
}