<div class="contenedor-principal">
 <?php 
  
  if(isset($_GET["clv"])&&!empty($_GET["clv"])){
 ?>
  <h2 class="encabezado">Editar nómina</h2>
  <form action="?pag=13" method="post" class="form-inputs-muchos">
      <?php
              $query='select * from tbnominas where clave="'.$_GET["clv"].'"';
              $resultado=mysqli_query(conecta(),$query);
              while($mostrar=mysqli_fetch_assoc($resultado)){
                  ?>
                  <span class="nota-form">Nota: los datos con * son obligatorios</span>
                  <div class="container-inputs">
                    <label>Clave: </label>
                    <input readonly type="text" value="<?php echo $mostrar["clave"]; ?>" name="clave">
                    <label>Nombre:</label>
                    <input readonly type="text" name="nombre" value="<?php echo $mostrar["nombre"]; ?>">
                    <label>Fecha inicio nómina: *</label>
                    <input type="date" value="<?php echo $mostrar["fecha_inicio"]; ?>" name="fechaI">
                    <label>Fecha fin nómina: *</label>
                    <input type="date" value="<?php echo $mostrar["fecha_fin"]; ?>" name="fechaF">
                    <label>Fecha de pago: *</label>
                    <input type="date" value="<?php echo $mostrar["fecha_pago"]; ?>" name="fechaP">
                    <label>Horas trabajadas diaras: *</label>
                    <input type="number" value="<?php echo $mostrar["horas"]; ?>" name="horas">
                    <label>Incapacidad: *</label>
                    <select name="incapacidad">
                        <option value="0">Seleccione</option>
                        <?php 
                            $query='select * from tbincapacidades';
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
                    <label>Días de incapacidad: *</label>
                    <input type="number" value="<?php echo $mostrar["dias"]; ?>" name="dias" min="0" max="5"> 
                    <label>Descuento ISR: *</label>
                    <input type="number" value="<?php echo $mostrar["descISR"]; ?>" name="descISR" min="0" max="500" step="0.5">
                    <label>Descuento IMSS: *</label>
                    <input type="number" value="<?php echo $mostrar["descIMSS"]; ?>" name="descIMSS" min="0" max="500" step="0.5">
                  </div>
                  <div class="container-buttons">
                    <input type="submit" name="edit" value="Editar y calcular">
                  </div>
                  <?php
                  
              }
      ?>
  </form>
  <?php 
  }
  ?>
</div>
