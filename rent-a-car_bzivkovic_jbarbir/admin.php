<!DOCTYPE html>
<html>
<head>
<title>Rent-a-Car VELERI</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Playfair Display", sans-serif}
.cars {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("images/auto.jpg");
  min-height: 90%;
}
.over-text-top {
    position: relative;
    top: 20px;
    left: -2%;
}
.over-text-bottom {
    position: relative;
    bottom: 120px;
    left: -2%;
}
</style>
<script>
    var httpRequest_lista = new XMLHttpRequest();
    httpRequest_lista.onreadystatechange = function(){
        if(httpRequest_lista.readyState==4 && httpRequest_lista.status==200) {
            //window.alert("tusam2");
            if (this.responseText==""){
                document.getElementById("lista").innerHTML = "Nema podataka";
            }else{
                //window.alert(this.responseText);
                document.getElementById("lista").innerHTML = this.responseText.rtrim("<hr>");
            "<div class='w3-container w3-pink'><pre>Provjera podataka u bazi:\n"+this.responseText+"</pre></div>";
            }
            //"<div class='w3-container'>Poruka: "+tekst+"<br> e-mail: "+email+"</div>"; 
        }
    }
    
    function loadLista(strKategorija){
        if (strKategorija=="AUT")
        httpRequest_lista.open("GET","adm_automobili.php");

        if (strKategorija=="REZ")
        httpRequest_lista.open("GET","adm_rezervacije.php");

    
        httpRequest_lista.send();
    }
    
    function odaberiAuto(naziv,id){
        document.getElementById('racAuto').value=naziv;
        document.getElementById('racAutoId').value=id;
        //window.alert('Vozilo '+naziv+' je dodano u rezervaciju');
    }

    function obrisiAuto(id){
        httpRequest_lista.open("GET","adm_automobili.php?obrisi="+id);
        httpRequest_lista.send();
    }

    function dodajAuto(){
        httpRequest_lista.open("GET","adm_automobili.php?dodaj=1"+
		"&kat="+document.getElementById('rac_kat').value+
		"&proizvodjac="+document.getElementById('rac_proizvodjac').value+
		"&model="+document.getElementById('rac_model').value+
		"&godiste="+document.getElementById('rac_godina').value+
		"&snaga="+document.getElementById('rac_snaga').value+
		"&cijena="+document.getElementById('rac_cijena').value+
		"&opis="+document.getElementById('rac_opis').value+
		"&slika="+document.getElementById('rac_slika').value
		);
        httpRequest_lista.send();
    }

    String.prototype.rtrim = function(s) { 
        return this.replace(new RegExp(s + "*$"),''); 
    };
</script>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="index.php#" class="w3-bar-item w3-button"><img src="images/rac-logo.png" style="width:30px;height:30px"/>&nbsp;&nbsp;HOME</a>
    <a href="index.php#cars" class="w3-bar-item w3-button">VOZILA</a>
    <a href="index.php#onama" class="w3-bar-item w3-button">O NAMA</a>
    <a href="index.php#kontakt" class="w3-bar-item w3-button">KONTAKT</a>
    <a href="#" class="w3-bar-item w3-button">Administracija</a>
    <a href="https://www.auto-data.net/en/" class="w3-bar-item w3-button" target="_blank">Autodata</a>
  </div>
</div>
  

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="cars">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Administracija</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="loadLista('AUT'); document.getElementById('racLUK').className='w3-col s4 tablink w3-padding-large w3-hover-orange w3-red'; document.getElementById('racTER').className='w3-col s4 tablink w3-padding-large w3-hover-orange';">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-orange" id='racLUK'>Automobili</div>
      </a>
      <a href="javascript:void(0)" onclick="loadLista('REZ'); document.getElementById('racLUK').className='w3-col s4 tablink w3-padding-large w3-hover-orange'; document.getElementById('racTER').className='w3-col s4 tablink w3-padding-large w3-hover-orange  w3-red';">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-orange" id='racTER'>Rezervacije</div>
      </a>
    </div>
    
    <div id="lista" style='font-size:15px;' class="w3-container w3-padding-32 w3-white"></div><br />
</div>



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>(C) Branimir Živković / Joško Barbir / studeni, 2023.</p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("cars");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-hover-orange w3-red";
}
document.getElementById("racLUK").click();
document.getElementById('racLUK').className='w3-col s4 tablink w3-padding-large w3-hover-orange w3-red';

var httpRequest_rezervacija = new XMLHttpRequest();
httpRequest_rezervacija.onreadystatechange = function(){
    if(httpRequest_rezervacija.readyState==4 && httpRequest_rezervacija.status==200) {
        //window.alert("tusam2");
        if (this.responseText==""){
            document.getElementById("rezervacijaMsg").innerHTML = "Nepoznata greška.";
        }else{
            //window.alert(this.responseText);
            if (this.responseText=="#DBadded#")
                document.getElementById("rezervacijaMsg").innerHTML = "Rezervacija je uspješno dodana";
            if (this.responseText=="#DBerror#")
                document.getElementById("rezervacijaMsg").innerHTML = "Rezervacija nije prihvaćena.";

        }
        //"<div class='w3-container'>Poruka: "+tekst+"<br> e-mail: "+email+"</div>"; 
    }
}

function rezervirajAuto(){
    var imeprezime = document.getElementsByName('racName')[0].value;
    var telefon = document.getElementsByName('racBrtel')[0].value;
    var email = document.getElementsByName('racEmail')[0].value;
    var id_automobila = document.getElementById('racAutoId').value;
    var datumOD = document.getElementsByName('racDateTimeFrom')[0].value;
    var datumDO = document.getElementsByName('racDateTimeTo')[0].value;
    var poruka = document.getElementsByName('racPoruka')[0].value;
    var rezString = "rezervacija.php?id_automobila="+id_automobila+"&imeprezime="+imeprezime+"&telefon="+telefon+"&email="+email+"&datumOD="+datumOD+"&datumDO="+datumDO+"&poruka="+poruka;
    //window.alert(rezString);
    httpRequest_rezervacija.open("GET",rezString);
    httpRequest_rezervacija.send();  
}
    
</script>

</body>
</html>
