<?php
    if (isset($_GET["id_automobila"])){
        
        $id_automobila = $_GET["id_automobila"];
        $imeprezime = $_GET["imeprezime"];
        $telefon = $_GET["telefon"];
        $email = $_GET["email"];
        $poruka = $_GET["poruka"];
        $datumOD = $_GET["datumOD"];
        $datumDO = $_GET["datumDO"];

        $connection = mysqli_connect('ucka.veleri.hr', 'bzivkovic', '11', 'bzivkovic');
        $res = mysqli_query($connection, "insert into rac_rezervacija (id_automobila, imeprezime, telefon, email, poruka, datumOD, datumDO) values (".$id_automobila.",'".$imeprezime."','".$telefon."','".$email."','".$poruka."','".$datumOD."','".$datumDO."');");
        if ($res){
            echo "#DBadded#";
        }else{
            echo "#DBerror#";
        }
    }
?>