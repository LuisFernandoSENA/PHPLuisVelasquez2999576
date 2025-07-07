<?php
  session_start();
  require_once("../../config/database.php");
 $db = new database;
 $con = $db->conectar();

 $doc = $_SESSION['doc_user'];
 $sql = $con ->prepare("SELECT * from usuarios inner join tipo_usuario on usuarios.id_tipo_usuario = tipo_usuario.id_tip_usuario where usuarios.id_documento = $doc") ;
 $sql -> execute();
 $fila = $sql -> fetch(); 
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista aprendiz</title>
</head>
<body>
    <h1>Bienvenido señ@r <?php echo$fila['nombre']; ?> su rol es <?php echo$fila['tipo_usuario'];?></h1>
</body>
</html>