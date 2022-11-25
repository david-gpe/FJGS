 <?php 
include "cn.php";

    $mat = utf8_decode($_POST["matricula"]);
    $fec =utf8_decode($_POST["fec"]);
    $he =$_POST["he"];;
    $hs =$_POST["hs"];;
       
        $consulta2 = "INSERT INTO registroasis(Matricula, horaEntrada, HoraSalida,Fecha) VALUES ('$mat','$he','$hs','$fec')";
    
        $res2 = mysqli_query($conexion,$consulta2);

    echo $consulta2;
    if ($res2) {
        $consultaActulización = "SELECT TIMESTAMPDIFF(SECOND,horaEntrada,HoraSalida) AS HorasLaboradas FROM AsistenciaUsuario";
        $resultdoconsulta = mysqli_query($conexion,$consultaActulización);
        $resultado = mysqli_fetch_array($resultdoconsulta);
        $segundos = $resultado["HorasLaboradas"];
        echo $segundos;

        $consultaRegistroSegundos = "UPDATE RegistroAsis SET HorasLaboradas = '$segundos' WHERE Matricula = '$mat' AND Fecha = '$fec'";
        $consultainsersionsegundos = mysqli_query($conexion,$consultaRegistroSegundos);

        if ($consultainsersionsegundos = true) {

             $connot = "INSERT INTO Notificaciones(Matricula, Causa, Fecha) VALUES('$mat','Ha sido registrado una asistencia', CURDATE())"; 
                    $resconnot = mysqli_query($conexion,$connot);
                    if ($resconnot=true) {
                        header('Location: ../1admin/RegistroAsisUs.php');
                    }
        }
    }    



 mysqli_close($conexion);
?>