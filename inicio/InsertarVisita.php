<?php
    include("conex_bd.php");

    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Santiago'));
    $DateAndTime = $Object->format("Y-m-d H:i:s");


    if(isset($_POST['lista1'],$_POST['lista2'])){
    $vis_id = $_POST["lista1"];
    $arr_id = $_POST["lista2"];
    $estado = '';
    if($vis_id !=0 && $arr_id !=0){

    #print $vis_id;
    #print "\n";
    #print $arr_id;
        $sql = "SELECT VIS_ESTADO FROM EA_VISITANTE WHERE VIS_ESTADO = 'NO'AND VIS_ID = $vis_id";
        $validacion = mysqli_query($conex, $sql);
            while($row = mysqli_fetch_array($validacion)){
                $estado=$row['VIS_ESTADO'];
            }
        if($estado == 'NO'){
            $sql = "INSERT into EA_REGISTRAR (VIS_ID, ARR_ID, RGT_HORAINGRESO)
            VALUES ('$vis_id', '$arr_id', '$DateAndTime')";
            $ingreso = mysqli_query($conex, $sql);
         
                    if($ingreso == true){
                        $sql = "UPDATE EA_VISITANTE
                        SET VIS_ESTADO = 'SI'
                        WHERE VIS_ID = '$vis_id' AND VIS_ESTADO = 'NO'";
                        $ingreso = mysqli_query($conex, $sql);
                        if($ingreso==true){ 
                        echo'<script type="text/javascript">alert("Se Registro Visita");
                        window.location.href="IngresoDeVisitante.php";</script>';
                        }else{
                            print "help";
                        }
                    }
        }else{
            echo'<script type="text/javascript">alert("No Se Registro Visita");
            window.location.href="IngresoDeVisitante.php";</script>';
        }
       
        
    }else
        echo '<script type="text/javascript">alert("Ingrese Datos Validos");
            window.location.href="IngresoDeVisitante.php";</script>';
    }
?>
