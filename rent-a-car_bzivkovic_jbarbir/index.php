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
  background-image: url("/images/auto.jpg");
  opacity: 90%;
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
                document.getElementById("lista").innerHTML = "Nema podataka.";
            }else{
                //window.alert(this.responseText);
                document.getElementById("lista").innerHTML = this.responseText.rtrim("<hr>");
            "<div class='w3-container w3-pink'><pre>Provjera podataka u bazi:\n"+this.responseText+"</pre></div>";
            }
            //"<div class='w3-container'>Poruka: "+tekst+"<br> e-mail: "+email+"</div>"; 
        }
    }
    
    function loadLista(strKategorija){
        httpRequest_lista.open("GET","lista.php?kategorija="+strKategorija);
        httpRequest_lista.send();
    }
    
    function odaberiAuto(naziv,id){
        document.getElementById('racAuto').value=naziv;
        document.getElementById('racAutoId').value=id;
        window.alert('Vozilo '+naziv+' je dodano u rezervaciju');
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
    <a href="#" class="w3-bar-item w3-button"><img src="images/rac-logo.png" style="width:30px;height:30px"/>&nbsp;&nbsp;HOME</a>
    <a href="#cars" class="w3-bar-item w3-button">VOZILA</a>
    <a href="#onama" class="w3-bar-item w3-button">O NAMA</a>
    <a href="#kontakt" class="w3-bar-item w3-button">KONTAKT</a>
    <a href="admin.php" class="w3-bar-item w3-button">Administracija</a>
	<a href="https://www.auto-data.net/en/" class="w3-bar-item w3-button" target="_blank">Autodata</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <!--<span class="w3-tag w3-xlarge">Dostupni 0-24</span>-->
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">Rent-a-Car</span>
    <!--<span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>thin<br>CRUST PIZZA</b></span>-->
    <p><a href="#cars" class="w3-button w3-xxlarge w3-black">Prikaži sva vozila</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="cars">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Automobili</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="loadLista('LUK'); document.getElementById('racLUK').className='w3-col s4 tablink w3-padding-large w3-hover-orange w3-red'; document.getElementById('racTER').className='w3-col s4 tablink w3-padding-large w3-hover-orange'; document.getElementById('racKAR').className='w3-col s4 tablink w3-padding-large w3-hover-orange'">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-orange" id='racLUK'>Luksuzni</div>
      </a>
      <a href="javascript:void(0)" onclick="loadLista('TER'); document.getElementById('racLUK').className='w3-col s4 tablink w3-padding-large w3-hover-orange'; document.getElementById('racTER').className='w3-col s4 tablink w3-padding-large w3-hover-orange  w3-red'; document.getElementById('racKAR').className='w3-col s4 tablink w3-padding-large w3-hover-orange'">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-orange" id='racTER'>Terenci</div>
      </a>
      <a href="javascript:void(0)" onclick="loadLista('KAR'); document.getElementById('racLUK').className='w3-col s4 tablink w3-padding-large w3-hover-orange'; document.getElementById('racTER').className='w3-col s4 tablink w3-padding-large w3-hover-orange'; document.getElementById('racKAR').className='w3-col s4 tablink w3-padding-large w3-hover-orange w3-red'">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-orange" id='racKAR'>Karavani</div>
      </a>
    </div>
    
    <div id="lista" class="w3-container w3-padding-32 w3-white"></div><br />
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="onama">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">O nama</h1>
    <p>Rent-a-Car Veleri specijalizirana je tvrtka za najam kvalitetnih i luksuznih vozila utemeljena davne 2023. godine u Rijeci, od strane Branimira Živkovića i Joška Barbira. Najam prestižnog vozila za mnoge je vozače prilika da sjednu za volan luksuznog automobila visoke klase. Zahvaljujući pristupačnosti i fleksibilnosti najma, sada je lakše nego ikad voziti automobil svojih snova.</p>
    <p>Stojimo vam na raspolaganju!</p>
    <img src="images/rac_veleri.jpg" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="Restaurant">
    <h1><b>Radno vrijeme salona</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Ponedjeljak 06:00-20:00</p>
        <p>Utorak/Srijeda 10:00 - 20:00</p>
        <p>Četvrtak 08:00 - 20:00</p>
      </div>
      <div class="w3-col s6">
        <p>Petak 06:00 - 24:00</p>
        <p>Subota 06:00 - 24:00</p>
        <p>Nedjeljom ne radimo</p>
      </div>
    </div>
    
  </div>
</div>

<!-- Image of location/map -->
<img src="/images/map.jpg" class="w3-image w3-greyscale" style="width:100%;" id="kontakt">

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Online rezervacija</h1>
    <p><span class="w3-tag">FYI!</span>Posjetite nas na adresi Vukovarska ulica. 58, 51000, Rijeka, tel. +385 51 51 51 51</p>
    <p class="w3-xxlarge"><strong>Rezervirajte</strong>&nbsp;svoj automobil na vrijeme!</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Ime i prezime" required name="racName"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Broj telefona" required name="racBrtel"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Vaš E-mail" required name="racEmail"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Odaberite vozilo" readonly required name="racAuto" id="racAuto" onclick="window.location='#cars';"><input type="hidden" id="racAutoId"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="racDateTimeFrom" value="2023-11-11T20:00"> 
      <input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="racDateTimeTo" value="2023-11-12T20:00">
      </p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Poruka \ posebni zahtjevi" name="racPoruka"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="button" onclick="rezervirajAuto();">Rezerviraj</button></p>
    </form>
    <div id="rezervacijaMsg" class="w3-container w3-orange"></div>
  </div>
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
    window.alert(rezString);
    httpRequest_rezervacija.open("GET",rezString);
    httpRequest_rezervacija.send();  
}
    
</script>

</body>
</html>
