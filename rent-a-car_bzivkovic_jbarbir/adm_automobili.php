<?php
    $connection = mysqli_connect('ucka.veleri.hr', 'bzivkovic', '11', 'bzivkovic');

	if (isset($_GET["obrisi"])){
		$query="DELETE FROM rac_automobili where id=".$_GET["obrisi"];
		$res = mysqli_query($connection,$query);
	}
	if (isset($_GET["dodaj"])){
		$query="INSERT INTO rac_automobili (kategorija, proizvodjac, model, godina, snaga, cijena, opis, slika) values ('".strtoupper($_GET["kat"])."','".$_GET["proizvodjac"]."','".$_GET["model"]."', '".$_GET["godiste"]."','".$_GET["snaga"]."','".$_GET["cijena"]."','".$_GET["opis"]."','".$_GET["slika"]."')";
		$res = mysqli_query($connection,$query);
	}
	//echo "<div>123".$query."456</div>";
	$query="SELECT * FROM rac_automobili";
	$res = mysqli_query($connection,$query);
	if (mysqli_num_rows($res)>0) {
		echo "<table class='w3-table'><tr><th>&nbsp;</th><th>ID</th><th>Kat</th><th>Proizvodjac</th><th>Model</th><th>Godište</th><th>Snaga</th><th>Cijena €/dan</th><th>Opis</th></tr>";
		while ($row=mysqli_fetch_array($res)){;
		   echo "<tr>";
		   echo "<td><img src='images/icons/edit_remove.png' onclick='obrisiAuto(".$row['id'].")' style='width:24px;cursor:pointer;'/></td>";
		   echo "<td>".$row['id']."</td>";
		   echo "<td>".$row['kategorija']."</td>";
		   echo "<td>".$row['proizvodjac']."</td>";
		   echo "<td>".$row['model']."</td>";
		   echo "<td>".$row['godina']."</td>";
		   echo "<td>".$row['snaga']."</td>";
		   echo "<td>".$row['cijena']."</td>";
		   echo "<td>".$row['opis']."</td>";
		   echo "</tr>"; 
		   $lastid = $row['id']+1;
		}
		echo "<tr>";
		echo "<td><img src='images/icons/edit_add.png' onclick='dodajAuto()' style='width:24px;cursor:pointer;'/></td>";
		echo "<td><input id='id' type='text' value='".$lastid."' style='width:35px;' /></td>";
		echo "<td><input id='rac_kat' type='text' value='' style='width:35px;' placeholder='Kat'/></td>";
		echo "<td><input id='rac_proizvodjac' type='text' style='width:80px;' value='' placeholder='Proizvodjac'/></td>";
		echo "<td><input id='rac_model' type='text' style='width:100px;' value='' placeholder='Model'/></td>";
		echo "<td><input id='rac_godina' type='text' style='width:35px;' value='' placeholder='God'/></td>";
		echo "<td><input id='rac_snaga' type='text' style='width:35px;' value='' placeholder='kW'/></td>";
		echo "<td><input id='rac_cijena' type='text' style='width:50px; 'value='' placeholder='€/dan'/></td>";
		echo "<td><input id='rac_opis' type='text' style='width:250px; 'value='' placeholder='Opis'/>&nbsp;";
		echo "<input id='rac_slika' type='text' style='width:250px; 'value='' placeholder='url slike'/><td>";
		echo "</tr>"; 
	
		echo "</td>";
	} else {  echo "zapis ne postoji u bazi"; }
	
	mysqli_close($connection);
?>