<?php
$id=$_POST["id"];
$nombreRol=$_POST["nombreRol"];

 include 'Conexion.php';
if($id==""){

$stmt = $conn->prepare("CALL sp_insertarRoles(?)");

$stmt->bindParam(1, $nombreRol, PDO::PARAM_STR);

$stmt->execute();

}
else {

  $stmt = $conn->prepare("CALL sp_modificarRoles(?,?)");
  $stmt->bindParam(1, $id, PDO::PARAM_INT);
  $stmt->bindParam(2, $nombreRol, PDO::PARAM_STR);

  $stmt->execute();




}
header("Location: dataRol.php");

 ?>
