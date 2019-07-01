

<?php
include("conexion.php");
$token=$_COOKIE["token"];
	$getID = $conn->prepare('SELECT idUsuario FROM tokensesion where token='.'\''.$token.'\'');  //se obtienen el id del usuario loggeado
	$getID->execute(); //se ejecuta la consulta
	$resultado = $getID->fetchAll(); //se obtienen los datos de la consulta
	if($getID->rowCount()>0){
		foreach ($resultado as $User) { //se extraen los datos
			$idUsuarios=$User['idUsuario'];
			echo $idUsuarios;
		}
		$getData = $conn->prepare('SELECT correoElectronico,Nombre,apellidoPaterno,apellidoMaterno,idDependencia,idRol FROM usuarios where idUsuarios='.'\''.$idUsuarios.'\'');  //se obtienen los datos del usuario
		$getData->execute(); //se ejecuta la consulta
		$resultado = $getData->fetchAll(); //se obtienen los datos de la consulta
		if($getData->rowCount()>0){
			foreach ($resultado as $User) { //se extraen los datos
				$correoElectronico=$User['correoElectronico'];
				$Nombre=$User['Nombre'];
				$apellidoPaterno=$User['apellidoPaterno'];
				$apellidoMaterno=$User['apellidoMaterno'];
				$idDependencia=$User['idDependencia'];
				$idRol=$User['idRol'];
			}
		}
	}else{
		if (isset($_COOKIE['token'])) {
			unset($_COOKIE['token']);
			setcookie('token', '', time() - 3600, '/'); // empty value and old timestamp
		}//borra la cookie al ya no ser valida
		header("Location: login.php	");//Entra a esta condición unicamente si la sesión no existe en la BD o la fecha de expiración ha vencido, redirige al login
		}






?>