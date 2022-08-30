<?php

include('recuperaCuenta.php');

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Recuperar cuenta</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="medios/contra.ico" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="estilos/normalize.css">
    <link rel="stylesheet" type="text/css" href="estilos/general.css">
    <link rel="stylesheet" type="text/css" href="estilos/departamentos.css">
    <link rel="stylesheet" type="text/css" href="estilos/login.css">
    <link rel="stylesheet" type="text/css" href="estilos/menu.css">
    <link rel="stylesheet" type="text/css" href="estilos/forgotpass.css">

    <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">


    <script src="jquery-3.6.0.min.js"></script>
    <script src="alertifyjs/alertify.js"></script>
</head>
<body class="body-contra">
    <?php 
        if(isset($_REQUEST["busca"])){
            if($error==0){
                ?>
                    <script type="text/javascript">
                     $(document).ready(function(){
                        alertify.success("Correo electrónico enviado con éxito!");
                    })
                    </script>

                <?php
            }
            if($error==1){
                ?>
                <div class="msj_error"><span>Por favor ingresa un correo electrónico</span></div>
                <?php
            }
            if($error==2){
                ?>
                <div class="msj_error"><span>No se pudo enviar el correo</span></div>
                <?php
            }
            if($error==3){
                ?>
                <div class="msj_error"><span>No se logró recuperar la cuenta</span></div>
                <?php
            }
            if($error==4){
                ?>
                <div class="msj_error"><span>No existe el correo electrónico</span></div>
                <?php
            }
        }
    
    ?>
    <form action="forgotPass.php" method="post" class="recuperacontra">
        <h1>Recupera tu cuenta</h1>
        <label>Ingresa tu correo electrónico para poder recuperar la cuenta: </label>
        <input type="email" name="correito" placeholder="ejemplo@gmail.com">
        <input type="submit" value="Buscar" name="busca">
    </form>
</body>
</html>