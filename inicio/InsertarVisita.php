<?php
    include("conex_bd.php");
    include("IngresoDeVisitante.php");

    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Santiago'));
    $DateAndTime = $Object->format("d-m-Y h:i:s a");

    $vis_id = $_POST["lista1"];
    $arr_id = $_POST["lista2"];
    
    $sql = "INSERT into EA_REGISTRAR (VIS_ID, ARR_ID, RGT_HORAINGRESO)
    VALUES ('$vis_id', '$arr_id', '$DateAndTime')";
    
    $ingreso = mysqli_query($conex, $sql);
     
    if($ingreso == true){
        echo'<script type="text/javascript">alert("Se Registro Visita");
        window.location.href="IngresoDeVisitante.php";</script>';
    }else{
        echo'<script type="text/javascript">alert("No Se Registro Visita");
        window.location.href="IngresoDeVisitante.php";</script>';
    }
?>
