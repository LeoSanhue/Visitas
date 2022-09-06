<?php
   include("conex_bd.php");
    if($_POST){
    $nombres   =  $_POST['nombres'];
    $apellidoP =  $_POST['apellidoP'];
    $apellidoM =  $_POST['apellidoM'];
    $rut       =  $_POST['rut'];
    $telefono  =  $_POST['telefono'];
    $estado='';
    $control=0;
    
    $sql= "SELECT VIS_RUT FROM EA_VISITANTE";    
    $validacion = mysqli_query($conex, $sql);
            while($row = mysqli_fetch_array($validacion)){
                $estado=$row['VIS_RUT'];
                if($estado==$rut)
                    $control=1;
            }
    if($control==0){
            $sql = "INSERT into EA_VISITANTE (VIS_RUT, VIS_NOMBRE, VIS_APELLIDOPATERNO, VIS_APELLIDOMATERNO, VIS_TELEFONO, VIS_ESTADO)
            VALUES ('$rut','$nombres','$apellidoP', '$apellidoM' ,'$telefono', 'NO')";
            $insercion = mysqli_query($conex, $sql);
     
            if($insercion == true){
                echo'<script type="text/javascript">alert("Se Agrego al Nuevo Visitante");
                window.location.href="RegistroVisitante.php";</script>';
            }else{
                echo'<script type="text/javascript">alert("No Se Agrego al Nuevo Visitante");
                window.location.href="RegistroVisitante.php";</script>';
            }
    }else{
    echo'<script type="text/javascript">alert("No Se Agrego al Nuevo Visitante");
        window.location.href="RegistroVisitante.php";</script>';
    }}
?>
