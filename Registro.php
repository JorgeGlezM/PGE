	<?php include 'header.php' ?>
		<div class="container"> 
			<div class="row justify-content-center text-center text-md-left">
				<div class="col-12 " >
				    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!--Comienzo menu de navegación dark--->
                        <a class="navbar-brand" href="#"> <!--Brand Primer menu--->
                         Perfil
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <!--boton decolapso--->
                        <span class="navbar-toggler-icon"></span> <!--icono del boton de colapso--->
                        </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--elementos de la navegacion--->
                        <ul class="navbar-nav mr-auto"> <!--ajuste automatico--->
                            <li class="nav-item active"><!--activacion de los menus del colapso--->
                            <a class="nav-link" href="IndexAdministrador.php">Inicio<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuarios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="Registro.php">Agregar Nuevo Usuario</a>
                               <a class="dropdown-item" href="#">Modificar Usuarios</a>
                            </div>
                            </li>
                            <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Roles
                               </a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="dataRol.php">Agregar Nuevo Rol</a>
                               <a class="dropdown-item" href="#">Modificar Roles</a>
                               </div>
                            </li>
                            <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Dependencias
                               </a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="dataDependencia.php">Agregar Dependencia</a>
                               <a class="dropdown-item" href="#">Modificar Dependencia</a>
                               </div>
                            </li>
                        </ul>
                    </div>
                </nav> <!--Fin  menu de navegación dark--->
					<form  class="Myformulario" method='POST' >
					    <div class="form-group text-center">
						    <h3>Registro del Usuario</h3>
					    </div>
					    <div class="form-group text-center">
						    <h2>Datos Personales</h2>
					    </div>
					    <div class="form-group text-center">
						    <span>Nombre:</span>
						    <input type="text" id="Nombre" name="Nombre" required=""  maxlength="45" pattern="[A-Za-z]+">
					   </div>
					   <div class="form-group text-center">
						  <span>Apellido Paterno:</span>
						  <input type="text" id="ApellidoP" name="ApellidoP" required="" pattern="[A-Za-z]+" maxlength="45">
					   </div>
					   <div class="form-group text-center">
						   <span>Apellido Materno:</span>
						   <input type="text" id="ApellidoM" name="ApellidoM" required="" pattern="[A-Za-z]+" maxlength="45">
					   </div>
					   <div class="form-group text-center">
						  <h2>Datos de usuario</h2>
					  </div>
					  <div class="form-group text-center">
						  <span>Correo eletr&oacute;nico:</span>
						  <input type="email" name="Correo" id="Correo" required="required">
					  </div>
					  <div class="form-group text-center">
						  <span>Contrase&ntilde;a:</span>
						  <input type="password" name="Contrasena" id="Contrasena" required=""  minlength="8" maxlength="20">
					  </div>
					  <div class="form-group text-center">
					       <span>Rol:</span>
						   <input type="text"  id="Rol" name="Rol" required="">
					  </div>
					  <div class="form-group text-center">
				           <span>Dependencia:</span>
						   <input type="text"  id="Dependencia" name="Rol" required="">
                      </div>
				      <div class="form-group text-center">
						   <input type="submit" class="btn btn-info" value="Registrarse" id="Registro"  name="Registro" style="margin: 25px;" required="">
					  </div>
				   </form>
    			 </div>
    	    </div>
		</div>
<?php 
include 'footer.php'; 
$id=1;
$Nombre=$_POST["Nombre"];
$ApellidoP=$_POST["ApellidoP"];     $ApellidoM=$_POST["ApellidoM"];
$Correo=$_POST["Correo"];  $Contra=$_POST["Contrasena"];
$Dependencia=1;
$Rol=1;
include 'Conexion.php';
$stmt=$conn->prepare("call sp_Insertar_Usuarios(?,?,?,?,?,?,?)");
$stmt->bindParam(1,$Correo, PDO::PARAM_STR);
$stmt->bindParam(2,$clave, PDO::PARAM_STR);
$stmt->bindParam(3,$Nombre, PDO::PARAM_STR);
$stmt->bindParam(4,$ApellidoP, PDO::PARAM_STR);
$stmt->bindParam(5,$ApellidoM, PDO::PARAM_STR);
$stmt->bindParam(6,$Dependencia, PDO::PARAM_STR);
$stmt->bindParam(7,$Rol, PDO::PARAM_STR);
$stmt->execute();
?>