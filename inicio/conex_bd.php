<?php
    $server = "146.83.194.142";
    $user = "E4software";
    $contra = "E4software1119";
    $bd = "E4software_bd";
    $conex =new mysqli($server,$user,$contra,$bd);
        if(!$conex){
            echo "error en el servidor";
        }
?>