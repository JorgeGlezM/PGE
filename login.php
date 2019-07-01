<?php include 'header.php' ?>
<?php
if (isset($_GET["error"])){
    $idError=$_GET["error"];


    if ($idError==2){ //Caso de mal password
        ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <p>Por favor revise que su correo y contraseña sean correctos</p>
            </div>

        </div>
    <?php }
    else    if ($idError==1) { //Caso de correo inexistente
        ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <p>El usuario ingresado no existe. Revisa tu correo porfavor</p>
            </div>

        </div>

    <?php }
} ?>
<div class="container">
  <div class="row justify-content-center text-center text-md-left">
  <div class="col-12 col-md-4 mt-4 mt-md-0">
      <form class="myformulario" action="verificarLogin.php" method="post" enctype="multipart/form-data">
          <div class="col-12 form-group">
              <label>Correo</label>
              <input   type="text" id="correo" name="correo" value="" maxlength="73" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required="" >

          </div>
          <div class="col-12   form-group">
              <label>Password</label>
              <input type="password" id="pass" name="pass" value="" maxlength="73" required="">
          </div>

          <div class="col-12   form-group ">
              <input type="submit"  id="entrar" name="entrar" value="Entrar">

          </div>

      </form>  </div>

</div>


</div>



<?php include 'footer.php' ?>
