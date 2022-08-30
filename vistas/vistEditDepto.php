
<div class="contenedor-principal">
  <?php
          if(isset($_GET["clv"])&&!empty($_GET["clv"])){
            ?>
  <h2 class="encabezado">Editar departamento</h2>
  <form action="?pag=4" method="post" class="form-inputs-muchos">
    <?php
              $query='select * from tbdepartamentos where clave="'.$_GET['clv'].'"';
              $resultado=mysqli_query(conecta(),$query);
              while($mostrar=mysqli_fetch_array($resultado)){
              ?>
              <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
              <div class="container-inputs">
                <label>Clave: </label>
                <input readonly type="text" value="<?php echo $mostrar['clave']; ?>" name="clave">
                <label for="">Nombre del departamento: *</label>
                <input type="text" maxlength="25" name="nombreDepa" value="<?php echo $mostrar['nombre']; ?>">
                <label>Descripción del departamento: </label>
                <textarea name="descDepa" maxlength="50"><?php echo $mostrar['descripcion']; ?></textarea>
              </div>
              <div class="container-buttons">
                <input type="submit" name="editarDepa" value="Guardar cambios">
              </div>
              <?php
              }
      ?>
  </form>
  <?php 
     }
  ?>
</div>
