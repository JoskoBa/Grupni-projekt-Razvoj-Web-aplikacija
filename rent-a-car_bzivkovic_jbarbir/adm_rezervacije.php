<?php
  $connection = mysqli_connect('ucka.veleri.hr', 'bzivkovic', '11', 'bzivkovic');

    $query="SELECT * FROM rac_rezervacija";
    $res = mysqli_query($connection,$query);
    if (mysqli_num_rows($res)>0) {
        echo "<table class='w3-table'><tr><th>ID</th><th>ID_Auto</th><th>Ime Prezime</th><th>Telefon</th><th>Email</th><th>poruka</th><th>datum od</th><th>Datum do</th></tr>";
        while ($row=mysqli_fetch_array($res)){;
           echo "<tr>";
           echo "<td>".$row['id']."</td>";
           echo "<td>".$row['id_automobila']."</td>";
           echo "<td>".$row['imeprezime']."</td>";
           echo "<td>".$row['telefon']."</td>";
           echo "<td>".$row['email']."</td>";
           echo "<td>".$row['poruka']."</td>";
           echo "<td>".$row['datumOD']."</td>";
           echo "<td>".$row['datumDO']."</td>";
           echo "</tr>"; 
        }
        echo "</td>";
    } else {  echo "zapis ne postoji u bazi"; }

  mysqli_close($connection);
?>