
// creeer popup element
function myPopup() {
    var popup = document.createElement("div");
    popup.setAttribute("id", "test");

    var form = document.createElement("form");
    form.setAttribute("action", "invoerenLeerling.php");
    form.setAttribute("id", "myForm");
    form.setAttribute("method", "post");
    form.setAttribute("enctype", "multipart/form-data")

    var naam = document.createElement("input");
    naam.setAttribute("name", "naam");
    naam.setAttribute("placeholder", "Naam");

    var adres = document.createElement("input");
    adres.setAttribute("name", "adres");
    adres.setAttribute("placeholder", "Adres");

    var woonplaats = document.createElement("input");
    woonplaats.setAttribute("name", "woonplaats");
    woonplaats.setAttribute("placeholder", "Woonplaats");

    var tel = document.createElement("input");
    tel.setAttribute("name", "tel");
    tel.setAttribute("placeholder", "telefoonnummer");

    var telNood = document.createElement("input");
    telNood.setAttribute("name", "telnood");
    telNood.setAttribute("placeholder", "tel.bij noodgeval");
    telNood.setAttribute("class", "popupForm");
    telNood.style.margin = "5px";

    var telOuders = document.createElement("input");
    telOuders.setAttribute("name", "telouders");
    telOuders.setAttribute("placeholder", "Telefoon ouders");

    var klasnr = document.createElement("input");
    klasnr.setAttribute("required", "");
    klasnr.setAttribute("name", "klas");
    klasnr.setAttribute("placeholder", "Klasnummer");
    klasnr.setAttribute("type", "number");

    //submitknop
    var submit = document.createElement("input");
    submit.setAttribute("type", "button");
    submit.setAttribute("value", "submit");
    submit.setAttribute("id", "submitKnop");
    submit.addEventListener("click", mySubmit);

//  Uploaden foto
    var loadAfb = document.createElement("input");
    loadAfb.setAttribute("type", "hidden");
    loadAfb.setAttribute("name", "MAX_FILE_SIZE");
    loadAfb.setAttribute("value", "40000");

    var fotoText = document.createElement("p");
    var fotoInnerText = document.createTextNode("Foto ophalen:");
    fotoText.appendChild(fotoInnerText);

    var userFile = document.createElement("input");
    userFile.setAttribute("name", "userfile");
    userFile.setAttribute("type", "file");

    //sluitknop
    var sluitknop = document.createElement("button");
    var t = document.createTextNode("X");
    sluitknop.setAttribute("id","sluitknop");
    sluitknop.appendChild(t);
    sluitknop.addEventListener("click", cancelPopup);

    //toevoegen child aan parent 
    form.appendChild(loadAfb);
    form.appendChild(fotoText);
    form.appendChild(userFile);
    form.appendChild(naam);
    form.appendChild(adres);

    form.appendChild(woonplaats);
    form.appendChild(tel);
    form.appendChild(telNood);
    form.appendChild(telOuders);
    form.appendChild(klasnr);

    popup.appendChild(sluitknop);
    popup.appendChild(form);
    popup.appendChild(submit);
    popup.setAttribute("class", "popupnaam");
    var popupvak = document.getElementById("klasID");
    popupvak.appendChild(popup);
}
//submit form in popup
function mySubmit() {
//    alert("ben bij addEvent");
    document.getElementById("myForm").submit();
}
//Function voor het registeren van de leerling
function aanwezig(leerling) {
    console.log(leerling.id);
    $.post("registreerAanwezigheid.php", {leerlingID: leerling.id}, function (data, status) {
//			$.post("./registreerAanwezigheid.php",  function(data){                                          
//				alert("Data: " + data + "\nStatus: " + status);
//				$('#somediv').html(data);
    });
}
// popup absentie
function myPopup_absentie(img) {
    var afbinhoud = img;
	console.log(img);

    var popup = document.createElement("div");
    popup.setAttribute("id", "test")

    var form = document.createElement("form");
    form.setAttribute("action", "storeAfwezigheid.php");
    form.setAttribute("id", "myFormAbsent");
    form.setAttribute("method", "get");
    form.setAttribute("enctype", "multipart/form-data");

    var id = document.createElement("input");
    id.setAttribute("type", "hidden");
    id.setAttribute("name", "leerlingID");
    id.setAttribute("value", afbinhoud.id);

    var textbox = document.createElement("p");
    var innerbox = document.createTextNode("Selecteer reden");
    textbox.appendChild(innerbox);

    //submitknop
    var submit = document.createElement("input");
    submit.setAttribute("type", "button");
    submit.setAttribute("value", "submit");
    submit.setAttribute("id", "submitKnop");
    submit.addEventListener("click", mySubmitAbsent);

    var afb = document.createElement("img");
    afb.setAttribute("class", "classafb");
    afb.setAttribute("id", "afb_absentie");
    afb.setAttribute("src", afbinhoud.src);

    var imgbox = document.createElement("div");
    imgbox.setAttribute("id", "imgbox");
    //    imgbox.setAttribute("width","50px");
    imgbox.appendChild(afb);


    //sluitknop
    var sluitknop = document.createElement("button");
    var t = document.createTextNode("X");
    sluitknop.setAttribute("id", "sluitknop");
    sluitknop.appendChild(t);
    sluitknop.addEventListener("click", cancelPopup);

    //droplist
    var select = document.createElement("select");
    select.setAttribute("name", "absentieID");
    loadDoc(select);

    //toevoegen child aan parent 
    form.appendChild(imgbox);
    form.appendChild(id);
    form.appendChild(textbox);
    form.appendChild(select);

    popup.appendChild(sluitknop);
    popup.appendChild(form);

    popup.appendChild(submit);
    popup.setAttribute("class", "popupnaam");

    // **********   var popupvak = document.getElementById("klasID");
    var popupvak = document.getElementById("subclass");
    popupvak.appendChild(popup);
}
function oldmyPopup_absentie(img) {
    var afbinhoud = img;

    var popup = document.createElement("div");
    popup.setAttribute("id", "test")

    var form = document.createElement("form");
    form.setAttribute("action", "storeAfwezigheid.php");
    form.setAttribute("id", "myFormAbsent");
    form.setAttribute("method", "get");
    form.setAttribute("enctype", "multipart/form-data");

    var id = document.createElement("input");
    id.setAttribute("type", "hidden");
    id.setAttribute("name", "leerlingID");
    id.setAttribute("value", afbinhoud.id);

    var textbox = document.createElement("p");
    var innerbox = document.createTextNode("Selecteer reden");
    textbox.appendChild(innerbox);

    //submitknop
    var submit = document.createElement("input");
    submit.setAttribute("type", "button");
    submit.setAttribute("value", "submit");
    submit.setAttribute("id", "submitKnop");
    submit.addEventListener("click", mySubmitAbsent);

    var afb = document.createElement("img");
    afb.setAttribute("class", "classafb");
    afb.setAttribute("id", "afb_absentie");
    afb.setAttribute("src", afbinhoud.src);

    var imgbox = document.createElement("div");
    imgbox.setAttribute("id","imgbox");
//    imgbox.setAttribute("width","50px");
    imgbox.appendChild(afb);


    //sluitknop
    var sluitknop = document.createElement("button");
    var t = document.createTextNode("X");
    sluitknop.setAttribute("id","sluitknop");
    sluitknop.appendChild(t);
    sluitknop.addEventListener("click", cancelPopup);

    //droplist
    var select = document.createElement("select");
    select.setAttribute("name", "absentieID");
    loadDoc(select);

    //toevoegen child aan parent 
    form.appendChild(imgbox);
    form.appendChild(id);
    form.appendChild(textbox);
    form.appendChild(select);

    popup.appendChild(sluitknop);
    popup.appendChild(form);

    popup.appendChild(submit);
    popup.setAttribute("class", "popupnaam");
	
// **********   var popupvak = document.getElementById("klasID");
//    var popupvak = document.getElementById("afbContainer");
//    popupvak.appendChild(popup);
}
//submit form in popup
function mySubmit() {
    document.getElementById("myForm").submit();
    document.getElementById("test").parentNode.removeChild(document.getElementById("test"));
}
function mySubmitAbsent() {
    document.getElementById("myFormAbsent").submit();
    document.getElementById("test").parentNode.removeChild(document.getElementById("test"));
}
// ajax for dropdown menu reden afwezigheid
function loadDoc(select) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            basFunction(this, select);
        }
    };
    xhttp.open("GET", "code_absentie.xml", true);
    xhttp.send();
}
// creeren option tags dropdown menu
function basFunction(xml, select) {
    var i;
    var xmlDoc = xml.responseXML;
    var x = xmlDoc.getElementsByTagName("code");
    for (i = 0; i < x.length; i++) {
        var codeValue = x[i].getElementsByTagName("option")[0].childNodes[0].nodeValue;
        var option = document.createElement("option");
        option.setAttribute("class", "option");
        option.setAttribute("id", "optionID" + i);
        option.setAttribute("value", codeValue);
        select.appendChild(option);
        document.getElementById('optionID' + i).innerHTML = codeValue;
    }
}
// popup deleten
function cancelPopup() {
    document.getElementById("test").parentNode.removeChild(document.getElementById("test"));
}
// drag en drop
// maakt drop in element mogelijk voor ontvangst
function allowDrop(ev) {
    ev.preventDefault();
}
// maakt draggen element mogeijk
function drag(ev, dragItem) {
    ev.dataTransfer.setData("text", ev.target.id);
}
// maakt drop element mogelijk
function drop(ev, draggedItem) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var testcontainer = draggedItem.id; //bepalen id vak
    alert(testcontainer);
    var list = document.getElementById(testcontainer).lastElementChild.id;// bepalen laatste kind van divelement    
//    var leerlingID;
//    var nieuweKlas;
    if (testcontainer == "zoekvak") {
        document.getElementById(list).style.width="95%";
        document.getElementById(list).style.height="180px";
        document.getElementById(list).style.display="block";
        $.get("moveLeerlingNaarNewKlas.php", {leerlingID: list, nieuweKlas: 0}, function (data, status) {
            alert(list);
           // alert("Data: " + data + "\nStatus: " + status);
        });
    } else if (testcontainer == "subclass"){
        document.getElementById(list).style.display="inline-block";
        document.getElementById(list).style.width="20%";
        document.getElementById(list).style.height="30%";
        $.get("moveLeerlingNaarNewKlas.php", {leerlingID: list, nieuweKlas: 1}, function (data, status) {
            alert(list);
        });
    }
}