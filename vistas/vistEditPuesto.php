<div class="contenedor-principal">
<?php
          if(isset($_GET["clv"])&&!empty($_GET["clv"])){
            ?>
  <h2 class="encabezado">Editar Puesto</h2>
  <form action="?pag=6" method="post" class="form-inputs-muchos">
    <?php
              $query='select * from tbpuestos where clave="'.$_GET['clv'].'"';
              $resultado=mysqli_query(conecta(),$query);
              $cont=1;
              while($mostrar=mysqli_fetch_array($resultado)){
                  ?>
                      <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
                      <div class="container-inputs">
                        <label>Clave: </label>
                        <input readonly type="text" value="<?php echo $mostrar['clave']; ?>" name="clave"> 
                        <label>Nombre del puesto: *</label>
                        <input name="nombrePuesto" maxlength="25" type="text" value="<?php echo $mostrar['nombre']; ?>"> 
                        <label>Descripción del puesto: *</label>
                        <textarea name="descPuesto" maxlength="50"><?php echo $mostrar['descripcion']; ?></textarea>
                        <label>Departamento al que pertenece: *</label>
                        <select class="" name="deptoPuesto">
                          <option value="0">Seleccione</option>
                          <?php
                            $query='select * from tbdepartamentos';
                            if($querySQL=mysqli_query(conecta(),$query)){
                              $cont1=1;
                              while($res=mysqli_fetch_assoc($querySQL)){
                          ?>
                          <option value="<?php echo $cont1; ?>"
                          <?php
                            
                          ?>
                          ><?php echo $res["nombre"]; ?></option>
                        <?php
                          $cont1++;
                            }
                          }
                        ?>
                        </select>
                        <label>Pago: *</label>
                        <input type="number" step="0.5" name="pagoPuesto" min="20" max="100" value="<?php echo $mostrar["pago"] ?>">
                      </div>
                      <div class="container-buttons">
                        <input type="submit" value="Guardar cambios" name="editaPuesto">
                      </div>
                  <?php
                  $cont++;
              }
      ?>
  </form>
  <?php
        }
        ?>
</div>