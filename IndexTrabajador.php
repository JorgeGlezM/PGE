<?php include 'header.php';
if (!$_GET) 
{
   header('Location:IndexAdministrador.php?pagina=1');
}
?>
<div class="container"> <!--Contenedor indica que lo que este dentro sera centrado--->
    <div class="row justify-content-center text-center text-md-left" > <!--Contenedor de boostrap que indica las columnas que contendra--->
        <div class="col-12 " ><!--Contenedor de boostrap de todo el ancho de la pagina--->
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
                             </li>
                              <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Roles
                             </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="dataRol.php">Agregar Nuevo Rol</a>
                             <a class="dropdown-item" href="#">Modificar Roles</a>
                             </li>
                             <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Dependencias
                             </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="dataDependencia.php">Agregar Dependencia</a>
                             <a class="dropdown-item" href="#">Modificar Dependencia</a>
                             </li>
                             </ul>
                        <form class="form-inline my-2 my-lg-0" method="POST">
                             <input class="form-control mr-sm-2" type="search"  aria-label="Search" name="Bdependencia" id="Bdependencia">
                             <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" id="Buscar">Buscar</button>
                       </form>
                    </div>
                </nav> <!--Fin  menu de navegación dark--->
  	        </div>
  	        <?php
                include 'Conexion.php'; //se incluye la conexión
                error_reporting(E_ALL^E_NOTICE);
                if ($_POST['Bdependencia']!="") {
                $BusquedaDependencia=$_POST['Bdependencia'];	
                $ConsultaDependencias = $conn->prepare("SELECT * FROM dependencia where nombreDeependencia 
                like '%$BusquedaDependencia%' ORDER BY idDependencia DESC ");  //se realiza la consulta de las dependencias
                $ConsultaDependencias->execute(); //se ejecuta la consulta
                $ResultadoDependencias = $ConsultaDependencias->fetchAll(); //se obtienen los datos de la consulta
                $dependenciasxPagina=8;
                $totalDependencias_bd=$ConsultaDependencias->rowCount();
                $paginas=$totalDependencias_bd/$dependenciasxPagina;
                $paginas=ceil($paginas);
                $iniciar=($_GET['pagina']-1)*$dependenciasxPagina;
                $ConsultaDependencias2 = $conn->prepare("SELECT * FROM dependencia where nombreDeependencia 
                like '%$BusquedaDependencia%' ORDER BY idDependencia DESC LIMIT :iniciar,:nDependencias");  //se realiza la consulta de las dependencias
                $ConsultaDependencias2->bindParam(':iniciar',$iniciar,PDO::PARAM_INT);
                $ConsultaDependencias2->bindParam(':nDependencias',$dependenciasxPagina,PDO::PARAM_INT);
                $ConsultaDependencias2->execute(); //se ejecuta la consulta
                }
                else{
                $ConsultaDependencias = $conn->prepare("SELECT * FROM dependencia ORDER BY idDependencia DESC");  //se realiza la consulta de las dependencias
                $ConsultaDependencias->execute(); //se ejecuta la consulta
                $ResultadoDependencias = $ConsultaDependencias->fetchAll(); //se obtienen los datos de la consulta
                $dependenciasxPagina=8;
                $totalDependencias_bd=$ConsultaDependencias->rowCount();
                $paginas=$totalDependencias_bd/$dependenciasxPagina;
                $paginas=ceil($paginas);
                $iniciar=($_GET['pagina']-1)*$dependenciasxPagina;
                $ConsultaDependencias2 = $conn->prepare("SELECT * FROM dependencia ORDER BY idDependencia DESC LIMIT :iniciar,:nDependencias");  //se realiza la consulta de las dependencias
                $ConsultaDependencias2->bindParam(':iniciar',$iniciar,PDO::PARAM_INT);
                $ConsultaDependencias2->bindParam(':nDependencias',$dependenciasxPagina,PDO::PARAM_INT);
                $ConsultaDependencias2->execute(); //se ejecuta la consulta
                    }
                
                $ResultadoDependencias2 = $ConsultaDependencias2->fetchAll(); //se obtienen los datos de la consulta
                foreach ($ResultadoDependencias2 as $Datos) { //se recorren los datos 
                       $IdentificadorDependencia=$Datos["idDependencia"]; 
                       $Nombre=$Datos['nombreDeependencia'];
                       $Calle=$Datos['calle'];
                       $Numero=$Datos['numero'];
                       $Colonia=$Datos['colonia'];
                       $CodigoPostal=$Datos['codigoPostal']
            ?>
  	        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3"> <!-- se incluye otro divisor para el diseño de las dependencias-->
				<div class="panel price panel-red">  <!-- se crea un panel principal que contendra las tarjetas-->
					<div class="panel-heading  text-center"> <!-- se centra la cabecera de la tarjeta-->
						<h3>Dependencia</h3>  <!-- Titulo de la tarjeta-->
					</div>
					<div class="panel-body text-center"> <!-- se incluye el cuerpo de la tarjeta-->
						<p class="lead" style="font-size:20px"><strong><?php  echo $Nombre; ?> </strong></p> <!-- nombre de las dependencias-->
					</div>
					<ul class="list-group list-group-flush text-center"> <!-- se agrupan los datos de las dependencias-->
						<li class="list-group-item"><i class="icon-ok text-danger"></i><b>Dirección:</b><?php echo $Calle ?> #<?php echo$Numero ?></li><!-- Calle y numero de las dependencias-->
						<li class="list-group-item"><i class="icon-ok text-danger"></i><b>Colonia: </b><?php echo $Colonia?> </li><!-- Colonia de las dependencias-->
						<li class="list-group-item"><i class="icon-ok text-danger"></i><b>Codigo Postal:</b> <?php echo $CodigoPostal; ?></li><!--Codigo Postal de las dependencias-->
					</ul>
					<div class="panel-footer">
						<a class="btn btn-lg btn-block btn-info" href="#">Informes</a><!--Boton que mandara a los informes de las dependencia elegida-->
					</div>
				</div>
		    </div>
        <?php } ?> <!--Cierre del ciclo para que se genere el diseño dependiendo del numero de dependencias en la base de datos-->
        </div>
        <div class="row">
           <div class="col-12" style="height: 20px;"></div>
           <div class="col-6 col-sm-4"></div>
           <div class="col-6 col-sm-4">
       	       <nav aria-label="...">
                   <ul class="pagination">
                      <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled':'' ?>">
                      <a class="page-link" href="IndexAdministrador.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a>
                      </li>
                      <?php for($i=0;$i<$paginas;$i++):?>
                      <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?>">
                      	<a class="page-link" href="IndexAdministrador.php?pagina=<?php echo $i+1; ?>">
                        <?php echo $i+1; ?>
                      	</a>
                      </li>
                      <?php endfor ?>
                      <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled':'' ?>">
                      <a class="page-link" href="IndexAdministrador.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a>
                      </li>
                    </ul>
               </nav>
           </div>
           <div class="col-6 col-sm-4"></div> 
        </div>
</div>
<?php include 'footer.php'
?>