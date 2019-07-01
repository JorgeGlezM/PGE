<?php
$id=$_POST["id"];
$nombre=$_POST["nombre"];
$calle=$_POST["calle"];
$colonia=$_POST["colonia"];
$numero=$_POST["numero"];
$cp=$_POST["cp"];
$referencias=$_POST["referencias"];


 include 'Conexion.php';

if($id==""){


$stmt = $conn->prepare("CALL sp_insertarDependencias(?,?,?,?,?,?)");
$stmt->bindParam(1, $nombre, PDO::PARAM_STR);
$stmt->bindParam(2, $calle, PDO::PARAM_STR);
$stmt->bindParam(3, $colonia, PDO::PARAM_STR);
$stmt->bindParam(4, $numero, PDO::PARAM_STR);
$stmt->bindParam(5, $cp, PDO::PARAM_STR);
$stmt->bindParam(6, $referencias, PDO::PARAM_STR);

$stmt->execute();
}
else {
  $stmt = $conn->prepare("CALL sp_modificarDependencias(?,?,?,?,?,?,?)");
  $stmt->bindParam(1, $id, PDO::PARAM_STR);
  $stmt->bindParam(2, $nombre, PDO::PARAM_STR);
  $stmt->bindParam(3, $calle, PDO::PARAM_STR);
  $stmt->bindParam(4, $colonia, PDO::PARAM_STR);
  $stmt->bindParam(5, $numero, PDO::PARAM_STR);
  $stmt->bindParam(6, $cp, PDO::PARAM_STR);
  $stmt->bindParam(7, $referencias, PDO::PARAM_STR);

$stmt->execute();

}
  header("Location: dataDependencia.php");

 ?>
