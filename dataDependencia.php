<?php include 'header.php' ?>
<?php if(isset($_GET["idDependencia"]))
 {//Si se envia ID, cambiar por POST
    $id=$_GET["idDependencia"];
    include "Conexion.php";
    $cadena='SELECT *FROM dependencia where idDependencia= :id';
    $gsent = $conn->prepare($cadena);
    $gsent->bindParam(':id', $id, PDO::PARAM_INT);
    $gsent->execute();
    $resultado = $gsent->fetch(PDO::FETCH_ASSOC);
    $nombreDeependencia=$resultado['nombreDeependencia'];
    $calle=$resultado['calle'];
    $colonia=$resultado['colonia'];
    $numero=$resultado['numero'];
    $codigoPostal=$resultado['codigoPostal'];
    $entreCalles=$resultado['entreCalles'];
    $funcion="Modificar"; 
 } 
else 
 {//Si no tiene ID
    $id="";
    $nombreDeependencia="";
    $calle="";
    $colonia="";
    $numero="";
    $codigoPostal="";
    $entreCalles="";
    $funcion="Insertar";
 }
 ?>
<div class="container">
    <h2 class="text-center">Dependencia</h1>
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
          <form class="Myformulario" action="dataDependenciaDB.php" method="post">
              <div class="form-group">
                  <label>Nombre</label>
                  <input title="Ejemplo: Transito"type="text"  name="nombre" value="<?php echo $nombreDeependencia ?>" maxlength="45" required=" " pattern="[a-zA-Z\s]+">
              </div>
              <div class="form-group">
                  <label>Calle</label>
                  <input title="Ejemplo: Mercado"type="text"  name="calle" value="<?php echo $calle ?>" maxlength="45" required=" " pattern="[a-zA-Z\s]+">
              </div>
              <div class="form-group">
                  <label>Colonia</label>
                  <input title="Ejemplo: Centro" type="text"  name="colonia" value="<?php echo $colonia ?>" maxlength="45" required=" " pattern="[a-zA-Z\s]+">
              </div>
              <div class="form-group">
                  <label>Número</label>
                  <input title="Ejemplo: 11"    type="text"  name="numero" value="<?php echo $numero ?>"  maxlength="45" pattern="[0-9]{1,3}$" required=" "  pattern="[a-zA-Z]+">
              </div>
              <div class="form-group">
                  <label>Codigo Postal</label>
                  <input title="Ejemplo: 63999"    type="text"  name="cp" value="<?php echo $codigoPostal ?>" maxlength="45" required=" "  pattern="[0-9]{5}">
              </div>
              <div class="form-group">
                  <label>Entre Calles</label>
                  <input title="Ejemplo: Mercado e Hidalgo"    type="text"  name="referencias" value="<?php echo $entreCalles ?>" maxlength="45" required=" " pattern="[a-zA-Z\s]+">
              </div>
              <div class="form-group text-center">
                  <input type="hidden"  name="id" value="<?php echo $id ?>">
                  <input class="btn btn-info" type="submit" id="Guardar" name="Guardar" value="<?php echo $funcion ?>">
             </div>
          </form>
      </div>
      </div>
</div>
<?php include 'footer.php' ?>
