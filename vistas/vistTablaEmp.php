<?php

  $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
  $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
  $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
  if(count($trabajadores)>=1){
?>
<h3 class="enc-tabla-datos">Total empleados: <?php echo count($trabajadores); ?> </h3>
<h4 class="sub-enc-paginas">Página: <?php
   if(isset($_GET["pg"])){
        echo $_GET["pg"]+1; 
   }
   else{
       echo "1";
   }
    
    ?> de <?php if(isset($maximoPag)){ echo $maximoPag; } ?></h4>
    <form class="form-exportar" action="empleados.php" method="post">
        <input type="submit" value="Exportar" name="excel">
    </form>
    <?php
    if($arr3[0]==1){
      ?>
    <form class="form-exportar" action="carta.php" method="post">
        <input type="submit" value="Redactar carta de renuncia">
    </form>
<?php
    }
?>
<div class="tb-datos">
<?php
foreach($trabajadores as $trabaja){
    ?>
        <div class="previo">
            <div class="details">
                <span><?php echo $trabaja[0]; ?></span>
                <span><?php echo $trabaja[1]; ?></span>
                <span><?php echo $trabaja[2]; ?></span>
                <span><?php echo $trabaja[7]; ?> </span>
                <span><?php echo $trabaja[9]; ?> </span>
                <span><?php echo $trabaja[10]; ?> </span>
                <span><?php echo $trabaja[11]; ?> </span>
            </div>
            <div class="buttons-tb">
            <?php
            if($arr2[4]==1){
              ?>
            <a class="accion" onclick="editaRegistro('<?php echo $trabaja[0]; ?>','8');" >Editar</a>
            <?php
            }
            if($arr3[4]==1){
            ?>
            <a class="accion" onclick="eliminaRegistro('<?php echo $trabaja[0]; ?>','7');">Eliminar</a>
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
