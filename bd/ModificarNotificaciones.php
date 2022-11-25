<?php
include "cn.php";
                $matricula = utf8_decode($_POST["Matricula"]);
              $consultausnot = "UPDATE Notificaciones SET Estado = true  WHERE Matricula='$matricula'";  
            $resus= mysqli_query($conexion,$consultausnot);  
            //echo $consultausnot;
                if ($resus=true) {
                    echo ($resus); 
                
            }
          



 mysqli_close($conexion);

?>


