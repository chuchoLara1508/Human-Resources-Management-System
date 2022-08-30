<div class="contenedor-principal">
  <?php
  if(isset($_REQUEST["registrarEmpleado"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>El empleado se registró correctamente</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Uno y/o más datos están incorrectos!</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Error al registrar empleado</span></div>
      <?php
    }
  }

  if(isset($err)){
    if($err==0){
      ?>
          <div class="msj_exito"><span>Empleado eliminado</span></div>
      <?php
    }
    if($err==1){
      ?>
          <div class="msj_error"><span>Ocurrió un error al eliminar</span></div>
      <?php
    }
  }

  if(isset($_REQUEST["editaEmpleado"])){
    if($error==0){
      ?>
      <div class="msj_exito"><span>La información se editó con exito!</span></div>
      <?php
    }
    else if($error==1){
      ?>
      <div class="msj_error"><span>Ingrese todos los datos</span></div>
      <?php
    }
    else if($error==2){
      ?>
      <div class="msj_error"><span>Ocurrió un error al editar</span></div>
      <?php
    }
  }

  ?>
  
  <h2 class="encabezado">Gestión de Empleados</h2>
  <form action="?pag=7" method="post" class="form-inputs-muchos">
    <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
    <div class="container-inputs">
      <label>Nombre (s): *</label>
      <input type="text" onkeypress="return soloLetras(event);" name="nombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];}?>" placeholder="Ej. Juan">
      <label>Apellido Paterno: *</label>
      <input type="text" onkeypress="return soloLetras(event);" name="apellidoP" value="<?php if(isset($_POST['apellidoP'])){echo $_POST['apellidoP'];}?>"  placeholder="Ej. Hernández">
      <label>Apellido Materno: </label>
      <input type="text" onkeypress="return soloLetras(event);" name="apellidoM" value="<?php if(isset($_POST['apellidoM'])){echo $_POST['apellidoM'];}?>" placeholder="Ej. López">
      <label>Número telefónico: *</label>   
      <input type="tel" onkeypress="return soloNumeros(event);" maxlength="10" placeholder="Ej. 2294774177" value="<?php if(isset($_POST['telEmpleado'])){echo $_POST['telEmpleado'];}?>" name="telEmpleado">
      <label>CURP: </label>
      <input type="text" name="curp" value="<?php if(isset($_POST['curp'])){echo $_POST['curp'];}?>" size="18" maxlength="18">
      <label>RFC: </label>
      <input type="text" name="rfc" value="<?php if(isset($_POST['rfc'])){echo $_POST['rfc'];}?>" sie="20" maxlength="20">
      <label>Calle: *</label>
      <input type="text" onkeypress="return soloLetras(event);" value="<?php if(isset($_POST['calle'])){echo $_POST['calle'];}?>" name="calle">
      <label>Número exterior: *</label>
      <input type="text" onkeypress="return soloNumeros(event);" value="<?php if(isset($_POST['numext'])){echo $_POST['numext'];}?>" name="numext">
      <label>Número interior (en caso de vivir en un departamento): </label>
      <input type="text" onkeypress="return soloNumeros(event);" value="<?php if(isset($_POST['numint'])){echo $_POST['numint'];}?>" name="numint">
      <label>Colonia: *</label>
      <input type="text" value="<?php if(isset($_POST['colonia'])){echo $_POST['colonia'];}?>" name="colonia">
      <label>Código postal: </label>
      <input type="text" onkeypress="return soloNumeros(event);" maxlength="4" value="<?php if(isset($_POST['cp'])){echo $_POST['cp'];}?>" name="cp">
      <label>Número de cuenta: *</label>
      <input type="text" onkeypress="return soloNumeros(event);" name="numeroCuenta" value="<?php if(isset($_POST['numeroCuenta'])){echo $_POST['numeroCuenta'];}?>">
      <label>Puesto: *</label>
      <select name="puesto">
      <option value="0">Seleccione</option>
                          <?php
                            $query='select * from tbpuestos';
                            if($querySQL=mysqli_query(conecta(),$query)){
                              $cont=1;
                              while($res=mysqli_fetch_assoc($querySQL)){
                          ?>
                          <option value="<?php echo $cont; ?>"
                          <?php
                
                          ?>
                          ><?php echo $res["nombre"]; ?></option>
                        <?php
                          $cont++;
                            }
                          }
                        ?>
      </select>
      <label>Fecha de nacimiento: *</label>
      <input type="date" name="fecha" value="<?php if(isset($_POST['fecha'])){echo $_POST['fecha'];}?>">
      <label>Nivel escolar: *</label>
      <select name="nivel">
        <option value="0">Seleccione</option>
        <option value="1"<?php if(isset($_POST['nivel'])&&($_POST["nivel"])==1){echo 'selected';}?>>Universidad</option>
        <option value="2"<?php if(isset($_POST['nivel'])&&($_POST["nivel"])==2){echo 'selected';}?>>Maestría</option>
        <option value="3"<?php if(isset($_POST['nivel'])&&($_POST["nivel"])==3){echo 'selected';}?>>Doctorado</option>
      </select>
      <div class="emple-button-box">
            <span class="tit-button">Género: * </span>
            <div class="radio">
                <div>
                    <input type="radio" name="grupo1" id="g1" value="Masculino"/>
                    <label for="g1">Masculino</label>
                </div>
                <div>
                    <input type="radio" name="grupo1" id="g2" value="Femenino"/>
                    <label for="g2">Femenino</label>
                </div>
            </div>
      </div>
      <label>País de nacimiento: *</label>
      <select name="pais" id="">
        <option value="0">Seleccione</option>
        <?php
                            $query='select * from pais';
                            if($querySQL=mysqli_query(conecta(),$query)){
                              while($res=mysqli_fetch_assoc($querySQL)){
                          ?>
                          <option value="<?php echo $res["id"]; ?>"
                          <?php
                              if(isset($_POST["pais"])&&$res["id"]==$_POST["pais"]){//inicio if
                                echo 'selected';
                                // se encarga de ejecutar una instruccion para seleccionar
                                //desde la base de datos todos los paises ordenados pornombre
                              }//cierre if
                          ?>
                          ><?php echo $res["paisnombre"]; ?></option>
                        <?php
                            }
                          }
                        ?>
      </select>
    </div>
    <div class="container-buttons">
      <input type="submit" name="registrarEmpleado" value="Registrar">
    </div>
  </form>
  
  <script src="js/soloNumerosLetras.js"></script>
</div>
