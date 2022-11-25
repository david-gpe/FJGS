<?php
include "cn.php";

    $colegitura = utf8_decode($_POST["colegitura"]);
    $id = utf8_decode($_POST["idalum"]);
    $idt = utf8_decode($_POST["idt"]);
    $mnt = utf8_decode($_POST["mnt"]);
    $fdp =$_POST["fec"];
        
        if(isset($_POST['selTU'])){
        if($_POST['selTU']=="Septiembre/Octubre"){
            $selTU = 1;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Octube/Noviembre") {
            $selTU = 2;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 
        }elseif ($_POST['selTU']=="Noviembre/Diciembre") {
            $selTU = 3;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 
        }elseif ($_POST['selTU']=="Diciembre/Febrero") {
            $selTU = 4;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 2 month")); 

        }elseif ($_POST['selTU']=="Febrero/Marzo") {
            $selTU = 5;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Marzo/Abril") {
            $selTU = 6;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Abril/Mayo") {
            $selTU=7;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Mayo/Junio") {
            $selTU=8;            
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }else {
            $selTU= utf8_decode($_POST["optiontMensualidad"]);
            }
        }

    
        $datosusua = "SELECT * FROM Colegiatura
                                        WHERE (MatriculaTutor = '$idt' AND IdColegiatura != '$colegitura') OR  
                                        (MatriculAlumno = '$id' AND IdColegiatura != '$colegitura') OR  
                                        (IdMensualidad = '$selTU' AND IdColegiatura != '$colegitura') OR  
                                        (Monto = '$mnt' AND IdColegiatura != '$colegitura') OR  
                                        (FechedePago = '$fdp' AND IdColegiatura != '$colegitura') OR  
                                        (FechadeProximoPago = '$fechaproximomes' AND IdColegiatura != '$colegitura')";

        $query = mysqli_query($conexion,$datosusua);
        $result = mysqli_num_rows($query);
        
        if ($result >= 0) {
                    
                    $cons =  "UPDATE Colegiatura
                                SET MatriculaTutor = '$idt', MatriculAlumno = '$id',  
                                IdMensualidad = '$selTU', Monto = '$mnt',  
                                FechedePago = '$fdp', FechadeProximoPago = '$fechaproximomes'
                                WHERE IdColegiatura = '$colegitura'";
                    $sql_update = mysqli_query($conexion, $cons);
                        if ($sql_update = true) {
                           header('Location: ../2fin/RePaCol.php');
                     }else{
                            header('Location: ../2fin/EditarPago.php');
                        }
            
        } else{
            echo "llegue al false";
           // header('Location: ../1admin/GestionUsuario.php');
        }

              




 mysqli_close($conexion);

?>
