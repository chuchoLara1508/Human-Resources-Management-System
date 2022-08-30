<?php

    if(isset($_REQUEST["entrar"])){
        if($error==1){
            ?>
            <div class="msj_error"><span>Ingrese los datos faltantes</span></div>
            <?php
          }
          else if($error==2){
            ?>
            <div class="msj_error"><span>Usuario y/o contraseña incorrectos</span></div>
            <?php
          }
          else if($error==3){
            ?>
            <div class="msj_error"><span>El captcha introducido es incorrecto</span></div>
            <?php
          }
    }

?>


<form class="logear" action="?pag=1" method="post">
    <h1>Iniciar sesión</h1>
    <div class="input-login" id="inp1" onclick="cambiaInput('inp1')">
      <input type="text" class="inp-text" name="usu" value="<?php if(isset($_POST["usu"])){ echo $_POST["usu"]; } ?>" placeholder="Nombre de usuario">
    </div>
    <div class="input-login" id="inp2" onclick="cambiaInput('inp2')">
      <input type="password" class="inp-pass" id="contra" name="contra" placeholder="Contraseña">
      <span onclick="mostrarContra()" class="eye">
            <i id="hide1" class="fas fa-eye"></i>
            <i id="hide2" class="fas fa-eye-slash"></i>
      </span>
    </div>
    <div class="captcha-container">
      <img src="includes/crear_imagen.php" id="captcha" class="captcha-img">
      <a href="javascript:recargarCaptcha();" title="Recargar">
        <img src="imagenes/recargar.gif" border="0" />
      </a>
    </div>
    <div class="input-login" id="inp3" onclick="cambiaInput('inp3')">
      <input type="text" class="inp-text" name="textoDeImagen" id="textoDeImagen" placeholder="Ingrese el captcha">
    </div>
    <a href="forgotPass.php" target="_blank" class="olvide">Olvidaste tu contraseña?</a>
    <input type="submit" name="entrar" value="Ingresar">
</form>


<script language="javascript" type="text/javascript">
			function recargarCaptcha(){
				document.getElementById("captcha").src = "includes/crear_imagen.php";
			}
		</script>