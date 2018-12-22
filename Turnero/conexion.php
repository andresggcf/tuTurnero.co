<?php
/*php.ini tiene los archivos de inicialización de php y errores*/

//conectar la base de datos de mySQL con la siguiente funcion
//parametros: servidor, usuario, clave, base de datos

$servidor = "localhost";
$usuario = "root";
$clave = "root";
$dbNombre = "turnero";

$link = mysqli_connect($servidor, $usuario, $clave, $dbNombre);

if (mysqli_connect_error()){

	die("there was an error connecting to database");
}

$name = $_GET['nombre'];
$age = $_GET['edad'];
$idcc = $_GET['cedula'];
$wr_qu = $_GET['preg_eq'];
$level = $_GET['nivel'];
$risk = $_GET['riesgo'];


/*echo "<h1>datos de usuario:</h1>";
echo "Nombre : ".$name."<br>";
echo "Edad  : ".$age."<br>";
echo "Cedula : ".$idcc."<br>";
echo "Equivocados : ".$wr_qu."<br>";
echo "Nivel : ".$level."<br>";
echo "Riesgo : ".$risk."<br>";*/
//query se escribira en SQL
$query = "SELECT * FROM usuarios";

$query_2 = "INSERT INTO usuarios (Nombre, Cedula, Edad, Preg_eq, Nivel_R, Resultado) VALUES ('".mysqli_real_escape_string($link, $name)."', '".mysqli_real_escape_string($link, $idcc)."', '".mysqli_real_escape_string($link, $age)."', '".mysqli_real_escape_string($link, $wr_qu)."', '".mysqli_real_escape_string($link, $level)."', '".mysqli_real_escape_string($link, $risk)."')";

/*echo $query_2;*/

//ejecutamos el query en el php para imprimirlo en la pagina
if(mysqli_query($link, $query_2)){
	$query = "asd";
} else {
	echo "Error: ".$query_2;
}

$link->close();

include("header.php");

?>

<body onload="modalScript()">
   <!-- ventana inicio -->
    <div class="ventana" id="inicio">
      <div class="container">
        <div>
          <div class="paragraph home_p hidden-main hidden-medium hidden-tiny">Gira el celular!
            <img src="images/Logo.png" class="image home">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">GRACIAS!</h5>
          </div>
          <div class="modal-body">
            <p id="modal_text"> Gracias por contestar nuestra encuesta, agradecemos tu paciencia y esperamos volverte a ver pronto! </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark b_blue" data-dismiss="modal" id="btn_cerrar">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

	<script type="text/javascript">
		function modalScript(){
			document.getElementById("exampleModalLongTitle").style.color = "green";
			$('#exampleModalCenter').modal('show');
		}


		document.getElementById('btn_cerrar').onclick = function(){
    // handle redirect here
    	var link = $('#exampleModalCenter').data('link');
    	location.href = "https://www.google.com/";
    	$('#exampleModalCenter').modal('hide');
}
	</script>

<?php	include("footer.php");?>