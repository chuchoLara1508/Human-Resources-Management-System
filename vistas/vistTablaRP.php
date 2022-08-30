<?php
  
  if(count($roles)>=1){
?>
<h3 class="enc-tabla-datos">Total roles-permisos: <?php echo count($roles); ?> </h3>
<h4 class="sub-enc-paginas">Simbología:</h4>
<h4 class="sub-enc-paginas">1: Tiene permiso</h4>
<h4 class="sub-enc-paginas">0: No tiene permiso</h4>
<h4 class="sub-enc-paginas">Página: <?php
   if(isset($_GET["pg"])){
        echo $_GET["pg"]+1; 
   }
   else{
       echo "1";
   }
    
    ?> de <?php if(isset($maximoPag)){ echo $maximoPag; } ?></h4>
<div class="tb-datos">
<?php 
    foreach($roles as $rol){
        ?>
             <div class="previo">
                 <div class="details">
                 <span>Rol: <?php echo $rol[1]; ?></span>
                 <span>Módulo: <?php echo $rol[2]; ?></span>
                 <span>Guardar: <?php echo $rol[3]; ?></span>
                 <span>Actualizar: <?php echo $rol[4]; ?></span>
                 <span>Eliminar: <?php echo $rol[5]; ?></span>
                 </div>
                 <div class="buttons-tb">
                 <a class="accion" onclick="editaRegistro('<?php echo $rol[0]; ?>','15');">Editar</a>
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