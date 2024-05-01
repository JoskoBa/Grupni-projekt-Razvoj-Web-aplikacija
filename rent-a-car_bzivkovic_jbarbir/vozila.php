<?php
  $connection = mysqli_connect('ucka.veleri.hr', 'bzivkovic', '11', 'bzivkovic');
  if (isset($_GET["kategorija"])){
    $kategorija=$_GET["kategorija"];
    if ($kategorija==""){
        //echo "#DBerror# - podaci nisu potpuni";
        die();
    }
    $query="SELECT * FROM rac_automobili";
    $res = mysqli_query($connection,$query);
    if (mysqli_num_rows($res)>0) {
        while ($row=mysqli_fetch_array($res)){;
        echo "<div class='w3-container'>";
            
           echo "<h1><b>".$row['proizvodjac']." ".$row['model']."</b>
           <div style='cursor:pointer' class='over-text-top w3-right w3-tag w3-red w3-round' onclick='odaberiAuto(\"".$row['proizvodjac']." ".$row['model']."\",".$row['id'].");'>Odaberi</div>
           <img src='images/cars/".$row['proizvodjac']." ".$row['model'].".jpg' style='width:100%' class='w3-round'>
           <div class='over-text-bottom w3-right w3-tag w3-dark-grey w3-round'>".$row['cijena']."<br/>€/dan</div>
           
           <br/>
           <br/></h1><p class='w3-text-grey'>".$row['opis']."</p>";
        echo "</div><hr>";
        }
    } else {  echo "zapis ne postoji u bazi"; }
  }
  mysqli_close($connection);
?>