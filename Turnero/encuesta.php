<?php
  include("header.php");
?>

<body>
  <!--Ventana de encuesta y toma de datos-->
    <div class="ventana" id="encuesta">
      <div class="container_2">
        <div class="izquierda_div">
          <h1 class="heading_blanco">Primero,</h1>
          <div class="parr_blanco">queremos conocerte <br>mejor...</div>
          <img src="images/Logo_2.png" alt="" class="img_small">
        </div>
        <div class="derecha_div hidden-small">
          <div>
            <div class="formulario">
              <div id="formulario_1" class="form">
                <label for="nombre" class="field_formulario">Tu nombre completo</label>
                <input type="text" id="nombre" name="nombre" data-name="nombre" maxlength="256" class="campo_blanco">
                <label for="cedula" class="field_formulario">Cédula o Tarjeta de Identidad</label>
                <input type="number" id="cedula" name="cedula" data-name="cedula" maxlength="256" class="campo_blanco">
                <label for="edad" class="field_formulario edad">Tu edad</label>
                <input type="number" id="edad" name="edad" data-name="edad" maxlength="256" class="campo_blanco">
                <button id="btn_submit" class="btn b_azul b_pequeno">Empezar</button>
              </div>
              <div id="display"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="ventana hidden-main hidden-medium hidden-tiny">
        <div class = "container">
          <div>
            <div class="paragraph home_p hidden-main hidden-medium hidden-tiny">Gira el celular!
              <img src="images/Logo.png" class="image home">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ventana" id="preguntas">
      <div class="container-2">
        <button id="btn_res" class="btn transp_btn" style="background-color: transparent;" data-toggle="modal" data-target="#exampleModalCenter"></button>
        <div class="hidden-small">
          <div>
            <img src="images/Logo.png" alt="" class="image home">
            <div class="tarjeta transp_1"> </div>
            <div class="tarjeta transp_2"> </div>
            <div class="tarjeta tarj_preg">
              <div>
                <p id="texto_pregunta" class="parr_azul"></p>
              </div>
              <button id="btn_si" type="button" class="btn btn-outline-dark b_blue" data-toggle="modal" data-target="#exampleModalCenter">Sí</button>
              <button id="btn_no" type="button" class="btn btn-outline-dark b_blue" style="float: right" data-toggle="modal" data-target="#exampleModalCenter">No</button>
              <button id="btn_terminar" type="button" class="btn btn-outline-danger b_red" style="display: none; float: right; border-radius: 45px;  padding:15px 65px 15px 65px; align-items: center;"  data-toggle="modal" data-target="#exampleModalCenter">Terminar</button>
            </div>
          
            <p class ="p_blanco">Pregunta</p>
            <div class="progress">
              <div id="barra_prog" class="progress-bar" role="progressbar" style="width: 2%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      
        <div class="ventana hidden-main hidden-medium hidden-tiny">
          <div class = "container">
            <div>
              <div class="paragraph home_p hidden-main hidden-medium hidden-tiny">Gira el celular!
                <img src="images/Logo.png" class="image home">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          </div>
          <div class="modal-body">
            <p id="modal_text"> ... </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark b_blue" data-dismiss="modal" id="btn_continuar">Continuar</button>
          </div>
        </div>
      </div>
    </div>

  <script type="text/javascript">

  var resp_mal = [];

  document.getElementById('btn_submit').onclick = function(){
    var ventana_e = document.getElementById('encuesta');
    var ventana_p = document.getElementById('preguntas');
    input_name = document.getElementById('nombre').value;
    input_cc = document.getElementById('cedula').value;
    input_edad = document.getElementById('edad').value;

    document.getElementById('display').innerHTML = input_name +' ' + input_cc ;
    ventana_e.style.display = 'none';
    ventana_p.style.display = 'block';
  };


  function mostrar_pregunta (numero){
    if (progreso >= 0 && progreso <= 2){
      document.getElementById("texto_pregunta").innerHTML = preguntas_con[progreso];
    }
    if (progreso >= 3 && progreso <= 5){
      document.getElementById("texto_pregunta").innerHTML = preguntas_act[progreso];
    }
    if (progreso >= 6 && progreso <= 10){
      document.getElementById("texto_pregunta").innerHTML = preguntas_pra[progreso];
    }
    console.log(input_name);
  }
  
  //si hace clic en sí, dependiendo de la pregunta 

  document.getElementById("btn_si").onclick = function(){
    if (progreso >= 0 && progreso <= 2){
      document.getElementById("exampleModalLongTitle").innerHTML = "Muy Bien!";
      document.getElementById("exampleModalLongTitle").style.color = "green";
      document.getElementById("modal_text").innerHTML = respuestas_con[progreso];
    }
    else if (progreso >= 3 && progreso <= 5){
      if (progreso == 3){
        document.getElementById("exampleModalLongTitle").innerHTML = "Muy Bien!";
        document.getElementById("exampleModalLongTitle").style.color = "green";
        document.getElementById("modal_text").innerHTML = respuestas_act[progreso];
      }
      else if(progreso >= 4 && progreso <= 5){
        document.getElementById("exampleModalLongTitle").innerHTML = "Recuerda que...";
        document.getElementById("exampleModalLongTitle").style.color = "red";
        document.getElementById("modal_text").innerHTML = respuestas_act[progreso];
        resp_mal.push(progreso+1);
        nivel_riesgo = nivel_riesgo + 1;
      }
    }
    else if(progreso >= 6 && progreso <= 10){
      if(progreso >= 6 && progreso <= 7){
        document.getElementById("exampleModalLongTitle").innerHTML = "Recuerda que...";
        document.getElementById("exampleModalLongTitle").style.color = "red";
        document.getElementById("modal_text").innerHTML = respuestas_pra[progreso];
        resp_mal.push(progreso+1);
        nivel_riesgo = nivel_riesgo + 1;
      }
      else if(progreso >= 8 && progreso <= 10){
        document.getElementById("exampleModalLongTitle").innerHTML = "Muy Bien!";
        document.getElementById("exampleModalLongTitle").style.color = "green";
        document.getElementById("modal_text").innerHTML = respuestas_pra[progreso];
      }
    }
    barra_progreso = barra_progreso + 9;
  };

  document.getElementById("btn_no").onclick = function(){
    if (progreso >= 0 && progreso <= 2){
      document.getElementById("exampleModalLongTitle").innerHTML = "Ten en cuenta!";
      document.getElementById("exampleModalLongTitle").style.color = "red";
      document.getElementById("modal_text").innerHTML = respuestas_con[progreso];
      resp_mal.push(progreso+1);
      nivel_riesgo = nivel_riesgo + 1;
    }
    else if (progreso >= 3 && progreso <= 5){
      if (progreso == 3){
        document.getElementById("exampleModalLongTitle").innerHTML = "Recuerda que...";
        document.getElementById("exampleModalLongTitle").style.color = "red";
        document.getElementById("modal_text").innerHTML = respuestas_act[progreso];
        resp_mal.push(progreso+1);
        nivel_riesgo = nivel_riesgo + 1;
      }
      else if(progreso >= 4 && progreso <= 5){
        document.getElementById("exampleModalLongTitle").innerHTML = "Muy bien!";
        document.getElementById("exampleModalLongTitle").style.color = "green";
        document.getElementById("modal_text").innerHTML = respuestas_act[progreso];
      }
    }
    else if(progreso >= 6 && progreso <= 10){
      if(progreso >= 6 && progreso <= 7){
        document.getElementById("exampleModalLongTitle").innerHTML = "Muy Bien!";
        document.getElementById("exampleModalLongTitle").style.color = "green";
        document.getElementById("modal_text").innerHTML = respuestas_pra[progreso];
      }
      else if(progreso >= 8 && progreso <= 10){
        document.getElementById("exampleModalLongTitle").innerHTML = "Recuerda que...";
        document.getElementById("exampleModalLongTitle").style.color = "red";
        document.getElementById("modal_text").innerHTML = respuestas_pra[progreso];
        resp_mal.push(progreso+1);
        nivel_riesgo = nivel_riesgo + 1;
      }
    }
    barra_progreso = barra_progreso + 9;
  };

  document.getElementById("btn_continuar").onclick = function () {
    progreso ++;
    
    document.getElementById("barra_prog").style.width = barra_progreso + "%";
    mostrar_pregunta(progreso);

    if(progreso == 11){
      document.getElementById("btn_si").style.display = "none";
      document.getElementById("btn_no").style.display = "none";
      document.getElementById("btn_res").style.display = "block";
      document.getElementById("btn_terminar").style.display = "block";
      document.getElementById("texto_pregunta").style.marginBottom = "25px";

      if (nivel_riesgo < 3){
        document.getElementById("texto_pregunta").innerHTML = "Tus prácticas de autocuidado son SATISFACTORIAS. Continua así y sigue las indicaciones de tu médico en cuanto a la toma de la citología.";
      }
      else if (nivel_riesgo >= 3 && nivel_riesgo < 7){
        document.getElementById("texto_pregunta").innerHTML = "Es muy importante que CUIDES TU SALUD. Si no te has realizado la citología, consulta tu centro de salud más cercano!";
      }
      else if (nivel_riesgo >= 7){
        document.getElementById("texto_pregunta").innerHTML = "Es muy importante que CUIDES TU SALUD. Si no te has realizado la citología, consulta tu centro de salud lo más pronto posible!";
      }
    }
  }

  document.getElementById("btn_res").onclick = function(){
    
    var color_texto = "";

    if (nivel_riesgo < 3){
      color = "green";
    }
    else if (nivel_riesgo >= 3 && nivel_riesgo < 7){
      color = "orange";
    }
    else if (nivel_riesgo >= 7){
      color = "red";
    }

    var resultados = "<b>Edad: </b>" + input_edad + "<br><b>Cedula: </b>" + input_cc + "<br><b>Nivel de riesgo: </b>" + riesgo +"<br><b>Total riesgo: </b>" + nivel_riesgo + " de 11";

    document.getElementById("exampleModalLongTitle").innerHTML = "Resultados de: " + input_name;
    document.getElementById("exampleModalLongTitle").style.color = color;
    document.getElementById("modal_text").innerHTML = resultados;
  };


  document.getElementById("btn_terminar").onclick = function(){
    if (nivel_riesgo < 3){
      riesgo = "BAJO";
    }
    else if (nivel_riesgo >= 3 && nivel_riesgo < 7){
      riesgo = "MEDIO";
    }
    else if (nivel_riesgo >= 7){
      riesgo = "ALTO";
    }
    var arr_mal = resp_mal.toString();
    console.log("name: " + input_name + " cc: " + input_cc + " edad: " + input_edad);
    console.log("barra progreso: " + barra_progreso + ", nivel riesgo: " + nivel_riesgo + ", progreso: " + progreso, "   e: " + arr_mal + " riesgo: " + riesgo);


    window.location.href="http://localhost/8_mysql/turnero/conexion.php?nombre="+input_name+"&cedula="+input_cc+"&edad="+input_edad+"&preg_eq="+arr_mal+"&nivel="+nivel_riesgo+"&riesgo="+riesgo;
    
  };

  mostrar_pregunta(progreso);


  </script>

<?php	include("footer.php");?>