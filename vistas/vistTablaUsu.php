<?php

    $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
  $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
  $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
    if(count($usuarios)>=1){
?>
<h3 class="enc-tabla-datos">Total de usuarios: <?php echo count($usuarios); ?> </h3>
<h4 class="sub-enc-paginas">Página: <?php
   if(isset($_GET["pg"])){
        echo $_GET["pg"]+1; 
   }
   else{
       echo "1";
   }
    
    ?> de <?php if(isset($maximoPag)){ echo $maximoPag; } ?></h4>
    <form class="form-exportar" action="usuarios.php" method="post">
        <input type="submit" value="Exportar" name="excel">
    </form>
    <div class="tb-datos">
<?php
        foreach($usuarios as $usua){
            ?>
            <div class="previo">
                <div class="details">
                <span><?php echo $usua[2]; ?></span>
                <span><?php echo $usua[3]; ?></span>
                <span><?php echo $usua[5]; ?> </span>
                </div>
                <div class="buttons-tb">
                <?php
                if($arr3[3]==1){
                    ?>
                <a class="accion" onclick="eliminaRegistro('<?php echo $usua[0]; ?>','16');">Eliminar</a>
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