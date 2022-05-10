<?php
   include("conex_bd.php");
   include("RegistroVisitante.php");
    $nombres   =  $_POST['nombres'];
    $apellidoP =  $_POST['apellidoP'];
    $apellidoM =  $_POST['apellidoM'];
    $rut       =  $_POST['rut'];
    $telefono  =  $_POST['telefono'];

    $sql = "INSERT into EA_VISITANTE (VIS_RUT, VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_APELLIDOMATERNO, VIS_TELEFONO)
            VALUES ('$rut','$nombres','$apellidoP', '$apellidoM' ,'$telefono')";
    $insercion = mysqli_query($conex, $sql);
     
    if($insercion==1){
        echo "se inserto";
    }else{
        echo "no se inserto";
    }
?>
