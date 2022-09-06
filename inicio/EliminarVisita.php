<?php
    include("conex_bd.php");
    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Santiago'));
    $DateAndTime = $Object->format("Y-m-d H:i:s");
    $rgt_id="";

    if(isset($_POST['RegistrarSalida']))
    {
        $vis_id = $_POST["lista1"];

        $sqlss = "SELECT R.RGT_ID FROM EA_VISITANTE V, EA_REGISTRAR R WHERE R.VIS_ID ='$vis_id' AND V.VIS_ESTADO='SI'";
        $ingreso3 = mysqli_query($conex, $sqlss);

        if($ingreso3)
        {
            
            while($row = mysqli_fetch_array($ingreso3)){
                $rgt_id=$row['RGT_ID'];
            }

            $sqls = "UPDATE EA_REGISTRAR set RGT_HORASALIDA='$DateAndTime' where RGT_ID='$rgt_id'";
            $ingreso2 = mysqli_query($conex, $sqls);
        

            $sql = "UPDATE EA_VISITANTE set VIS_ESTADO='NO' where VIS_ID='$vis_id'";
            $ingreso = mysqli_query($conex, $sql);
     
            if($ingreso == true){
                echo'<script type="text/javascript">alert("Se Eliminó Visita");
                 window.location.href="SalidaVisitante.php";</script>';
            }       
        }else{
            echo'<script type="text/javascript">alert("No Se Eliminó Visita");
            window.location.href="SalidaVisitante.php";</script>';
        }
    }

?>
