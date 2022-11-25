<?php
include "cn.php";

     if(isset($_POST['selTU'])){
        if($_POST['selTU']=="Administrador"){
            $selTU = 1;
        }elseif ($_POST['selTU']=="Alumno") {
            $selTU = 2;
        }elseif ($_POST['selTU']=="Director") {
            $selTU = 3;
        }elseif ($_POST['selTU']=="Docente") {
            $selTU = 4;
        }elseif ($_POST['selTU']=="Financiero") {
            $selTU = 5;
        }elseif ($_POST['selTU']=="Tutor") {
            $selTU = 6;
        }
        }

        $matric= utf8_decode($_POST["matriculausurio"]);
        $optiontiusuario= utf8_decode($_POST["optiontiusuario"]);
        $nombre = utf8_decode($_POST["nombre"]);
        $ap = utf8_decode($_POST["ap"]);
        $am = utf8_decode($_POST["am"]);
        $fec = $_POST["fec"];
        $curp =utf8_decode($_POST["curp"]);
        $rfc =utf8_decode($_POST["rfc"]);
        $edo =utf8_decode($_POST["edousurio"]);
        
        $datosusua = "SELECT * FROM DatosGenerales
                                        WHERE (nombre = '$nombre' AND Matricula = '$matric') OR  
                                        (ApellidoPaterno = '$ap' AND Matricula = '$matric') OR  
                                        (ApellidoMaterno = '$am' AND Matricula = '$matric') OR  
                                        (FechaNacimiento = '$fec' AND Matricula = '$matric') OR  
                                        (CURP = '$curp' AND Matricula = '$matric') OR  
                                        (RFC = '$rfc' AND Matricula = '$matric') OR  
                                        (Estado = '$edo' AND Matricula = '$matric')";

        $query = mysqli_query($conexion,$datosusua);
        $result = mysqli_num_rows($query);

        if ($query = true ) {
            if ($edo = "Habilitado") {
                $edoupdaate="Deshabilitado";
                $cons =  "UPDATE DatosGenerales
                                SET Estado = '$edoupdaate'
                                WHERE Matricula = '$matric'";
                    $sql_update = mysqli_query($conexion, $cons);
                        if ($sql_update = true) {
                            echo '<script>alert["Informacion atualizada"] </script>';
                            header('Location: ../1admin/GestionUsuario.php');
                        }else{
                            header('Location: ../1admin/editarUsuario.php');
                        }
            }
                    
        } else{
            header('Location: ../1admin/editarUsuario.php');
        }
 mysqli_close($conexion);

?>


