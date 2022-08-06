<?php
   include("conex_bd.php");
    if($_POST){
    $nombres   =  $_POST['nombres'];
    $apellidoP =  $_POST['apellidoP'];
    $apellidoM =  $_POST['apellidoM'];
    $rut       =  $_POST['rut'];
    $telefono  =  $_POST['telefono'];

    $sql = "INSERT into EA_VISITANTE (VIS_RUT, VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_APELLIDOMATERNO, VIS_TELEFONO, VIS_ESTADO)
            VALUES ('$rut','$nombres','$apellidoP', '$apellidoM' ,'$telefono', '')";
    $insercion = mysqli_query($conex, $sql);
     
    if($insercion == true){
        echo'<script type="text/javascript">alert("Se Agrego al Nuevo Visitante");
        window.location.href="RegistroVisitante.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("No Se Agrego al Nuevo Visitante");
        window.location.href="RegistroVisitante.php";</script>';
    }
}else{
    header("Location: RegistroVisitante.php");
}
?>
