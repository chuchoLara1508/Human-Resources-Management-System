<form action="?pag=14" method="post" class="form-busqueda">
  <div class="input-busc">
    <label>Rol: </label>
    <select class="" name="roles">
    <option value="0">Todos</option>
    <?php
        $query='select * from roles';
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
  </div>
  <div class="input-busc">
    <label>Módulo: </label>
    <select class="" name="modulos">
      <option value="0">Todos</option>
    <?php
        $query='select * from modulos';
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
  </div>
  <input type="submit" value="Buscar">
</form>