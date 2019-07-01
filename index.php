<?php include 'header.php';
include 'getInfo.php'//se incluye getInfo en todas las pantallas que requieran la informacion de la cuenta,este archivo redirige al login siempre que no haya una sesión vigente?>
<div class="container">
  <div class="row justify-content-center text-center text-md-left">
      <?php
      if (isset($_GET["status"])){
          $idStatus=$_GET["status"];

          if ($idStatus==1){ //Al redirigir del login
              ?>
              <div class="container" align="center">
                  <div class="alert alert-success" role="alert">
                      Login exitoso. ¡Bienvenido!. Está loggeado como: <?php echo $Nombre //la información de la BD se llama a traves del nombre de la variable en la clase getInfo?>
                  </div>

              </div>
          <?php } }
              ?>

  <div class="col-12 col-md-4 mt-4 mt-md-0">
Texto y cuerpo aquí
  </div>

</div>


</div>



<?php include 'footer.php' ?>
