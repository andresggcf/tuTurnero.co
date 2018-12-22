<?php

/*conectar la base de datos de mySQL con la siguiente funcion
parametros: servidor, usuario, clave, base de datos*/
  //include("conexion.php");



  include("header.php");
?>


<body>
   <!-- ventana inicio -->
    <div class="ventana" id="inicio">
      <div class="container">
        <div>
          <img src="images/Logo.png" class="image home hidden-small">
          <p class="paragraph home_p hidden-small"> Conoce tu riesgo de contraer Cáncer de Cuello Uterino</p>
          <a class="btn hidden-small b_azul" href="encuesta.php">Bienvenida</a>
          <div class="paragraph home_p hidden-main hidden-medium hidden-tiny">Gira el celular!
            <img src="images/Logo.png" class="image home">
          </div>
        </div>
      </div>
    </div>

	<script type="text/javascript">
	function clic_bienvenida(){
	  document.location.href='encuesta.php';
	}
	</script>

<?php	include("footer.php");?>