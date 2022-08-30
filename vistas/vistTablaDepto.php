<?php

   $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
  $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
  $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
   if(count($departamentos)>=1){
   ?>
   <h3 class="enc-tabla-datos">Total departamentos: <?php echo count($departamentos); ?> </h3>
   <h4 class="sub-enc-paginas">Página: <?php
   if(isset($_GET["pg"])){
        echo $_GET["pg"]+1; 
   }
   else{
       echo "1";
   }
    
    ?> de <?php if(isset($maximoPag)){ echo $maximoPag; } ?></h4>
    <form action="deptos.php" method="post" class="form-exportar">
        <input type="submit" value="Exportar" name="excel">
    </form>
    <div class="tb-datos">
   <?php
    foreach($departamentos as $depto){
        ?>
        <div class="previo">
            <div class="details">
                <span class="tit-tb"><?php echo $depto[1]; ?></span>
                <span><?php echo $depto[2]; ?></span>
            </div>
            <div class="buttons-tb">
            <?php
            if($arr2[2]==1){
                ?>
                <a class="accion" onclick="editaRegistro('<?php echo $depto[0]; ?>','4');">Editar</a>
            <?php
            }
            if($arr3[2]==1){
            ?>
                <a class="accion" onclick="eliminaRegistro('<?php echo $depto[0]; ?>','3');">Eliminar</a>
            <?php
            }
            ?>
            </div>
        </div>
        <?php
    }
       ?>
        </div>
        <?php
}
else{
    ?>
    <div class="msj_error"><span>Ups, no se encontraron coincidencias:(</span></div>
    <?php
}
?>
