<?php

date_default_timezone_set("America/Mexico_City");

session_start();

include('libs/libConexion.php');

include('libs/libValidaciones.php');
include('libs/libGeneral.php');
include('libs/libBusqueda.php');
include('libs/libMenu.php');

require('modelo/CDepartamento.php');
require('modelo/CPuesto.php');
require('modelo/CEmpleado.php');
require('modelo/CIncapacidad.php');
require('modelo/CNomina.php');
require('modelo/CRolPermiso.php');
require('modelo/CUsuario.php');


include('libs/libEnvioMail.php');

?>
<head>
    <title>Recursos Humanos</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="medios/sis.ico" rel="icon">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="estilos/normalize.css">
    <link rel="stylesheet" type="text/css" href="estilos/general.css">
    <link rel="stylesheet" type="text/css" href="estilos/departamentos.css">
    <link rel="stylesheet" type="text/css" href="estilos/login.css">
    <link rel="stylesheet" type="text/css" href="estilos/menu.css">

    <script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/jsLogin.js"></script>
    <script type="text/javascript" src="js/jsMenu.js"></script>

  <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">


  <script src="jquery-3.6.0.min.js"></script>
  <script src="alertifyjs/alertify.js"></script>
</head>
<body class="body-principal" id="body-pd">
    <?php
        include('control/ctrlPrincipal.php');
    ?>
</body>
<script>
  
  function editaRegistro(clave,pagina){
      alertify.confirm("¿Deseas editar el registro?",
      function(){
        window.location.href="?pag="+pagina+"&clv="+clave;
      },
      function(){
        alertify.error("Cancelado");
      }
      );
  }

  function eliminaRegistro(clave,pagina){
    alertify.confirm("¿Deseas eliminar el registro?",
      function(){
        window.location.href="?pag="+pagina+"&clv="+clave;
      },
      function(){
        alertify.error("Cancelado");
      }
      );
  }
  
 </script>
