<?php 
session_start();
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

if ($_POST["inicio"]) {
    $phone = $_POST["phone"]; 
    $contra = $_POST["clave"];   

    $sql = $con ->prepare("SELECT * FROM usuarios WHERE nro_celular = '$phone' AND contrasena = '$contra'") ;

    $sql -> execute();

    $fila = $sql -> fetch(); // fetchall todos o muchos fetch solo uno

    if ($fila){

        $_SESSION['doc_user'] = $fila ['id_documento'];
        $_SESSION['tipo'] = $fila ['id_tipo_usuario'];
        
        
        if ($_SESSION['tipo']== 1) {
            header("location:../model/admin/index.php");
            
        }
        if ($_SESSION['tipo']== 2) {
            header("location:../model/Aprendiz/index.php");
            
        }
        if ($_SESSION['tipo']== 3) {
            header("location:../model/funcionario/index.php");
            
        }


    }

else
{
 echo"<script>alert('Credenciales invalidas o usuario inactivo.')</script>";
 echo"<script>window.location='../index.php'</script>";
 exit();

}
}	
?>