<?php
   $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
  $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
  $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
   if(count($nominas)){
?>
<h3 class="enc-tabla-datos">Total nóminas: <?php echo count($nominas); ?> </h3>
<h4 class="sub-enc-paginas">Página: <?php
   if(isset($_GET["pg"])){
        echo $_GET["pg"]+1; 
   }
   else{
       echo "1";
   }
    
    ?> de <?php if(isset($maximoPag)){ echo $maximoPag; } ?></h4>
<form class="form-exportar" target="_blank" action="nominaTodos.php" method="post">
    <input class="accion" type="submit" value="Generar PDF de todas las nóminas">
</form>
<div class="tb-datos">
<?php
foreach($nominas as $nomi){

    ?>
        <div class="previo">
            <div class="details">
            <span><?php echo $nomi[2]; ?></span>
            <span><?php echo $nomi[3]; ?></span>
            <span>Inicio nómina: <?php echo $nomi[4]; ?> </span>
            <span>Fin nómina: <?php echo $nomi[5]; ?></span>
            <span>Total de pago: <?php echo "$".$nomi[18]; ?></span>
            </div>
            <div class="buttons-tb">
            <?php
            if($arr2[1]==1){
                ?>
            <a class="accion" onclick="editaRegistro('<?php echo $nomi[0]; ?>','13');">Editar</a>
            <?php
                }
            ?>
                <form action="nomina.php" target="_blank" method="post">
                    <input type="hidden" name="claveN" value="<?php echo $nomi[0]; ?>">
                    <input class="accion" type="submit" value="Generar PDF">
                </form>
            <?php
                if($arr3[1]==1){
            ?>
            <a class="accion" onclick="eliminaRegistro('<?php echo $nomi[0]; ?>','11');">Eliminar</a>
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