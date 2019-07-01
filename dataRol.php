<?php include 'header.php' ?>
<?php if(isset($_GET["idRol"])) {//Si se envia ID, cambiar por POST
  $id=$_GET["idRol"];
  include "Conexion.php";
$cadena='SELECT *
    FROM rol
    where idRol= :id';
  $gsent = $conn->prepare($cadena);
  $gsent->bindParam(':id', $id, PDO::PARAM_INT);
  $gsent->execute();
$resultado = $gsent->fetch(PDO::FETCH_ASSOC);
	$rol=$resultado['tipoRol'];
$funcion="Modificar";
} else {//Si no tiene ID
  $id="";
$rol="";
$funcion="Insertar";
} ?>
<div class="container">
  <h1 class="text-center">Rol de Usuario</h1>
  <div class="row justify-content-center text-center text-md-left">
    <div class="col-12 ">
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
    </div>
    <div class="col-12 col-md-4 mt-4 mt-md-0">  
      <form class="Myformulario" action="dataRolDB.php" method="post">
           <div class="form-group">
               <label>Tipo de Rol</label>
               <input title="Ejemplo: Trabajador"    type="text"  name="nombreRol" value="<?php echo $rol ?>" maxlength="45" required=" " pattern="[a-zA-Z]+">
           </div>
           <div class="form-group text-center">
            <input type="hidden"  name="id" value="<?php echo $id ?>">
            <input class="btn btn-info sss" type="submit" id="Guardar" name="Guardar" value="<?php echo $funcion ?>">
           </div>
      </form>
    </div>
</div>
</div>
<?php include 'footer.php' ?>
