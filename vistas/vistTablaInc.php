<?php
    $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
  $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
  $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
    if(count($incapacidades)>=1){
?>
<h3 class="enc-tabla-datos">Total incapacidades: <?php echo count($incapacidades); ?> </h3>
<h4 class="sub-enc-paginas">Página: <?php
   if(isset($_GET["pg"])){
        echo $_GET["pg"]+1; 
   }
   else{
       echo "1";
   }
    
    ?> de <?php if(isset($maximoPag)){ echo $maximoPag; } ?></h4>
    <form class="form-exportar" action="incapacidad.php" method="post">
        <input type="submit" value="Exportar" name="excel">
    </form>
    <div class="tb-datos">
<?php
foreach($incapacidades as $incs){
    ?>
        <div class="previo">
            <div class="details">
                <span><?php echo $incs[1]; ?></span>
                <span>Descuento/día: <?php echo $incs[2]."%"; ?></span>
            </div>
            <div class="buttons-tb">
            <?php
            if($arr2[5]==1){
                ?>
            <a class="accion" onclick="editaRegistro('<?php echo $incs[0]; ?>','10');">Editar</a>
            <?php
            }
            if($arr3[5]==1){
            ?>
            <a class="accion" onclick="eliminaRegistro('<?php echo $incs[0]; ?>','9');">Eliminar</a>
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