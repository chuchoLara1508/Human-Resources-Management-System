<?php 
 $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
 $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
 $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
 if($arr1[2]==0){
?>
<div class="contenedor-principal">
            <h2 class="encabezado">Búsqueda</h2>
<form action="<?php
    if($_GET["pag"]==3){
    echo "?pag=3";
    }
    if($_GET["pag"]==4){
        echo "?pag=4";
    }
    ?>" method="post" class="form-busqueda">
    <div class="input-busc">
        <label>Palabra: </label>
        <input type="text" value="<?php if(isset($nombre)){echo $nombre;} ?>" name="nombre">
    </div>
    <div class="input-busc">
        <label>Ordenar: </label>
        <select name="ordenar">
            <option value="0">Sin ordenar</option>
            <option value="1">A-Z(Nombre)</option>
            <option value="2">A-Z(Descripción)</option>
            <option value="3">Z-A(Nombre)</option>
            <option value="4">Z-A(Descripción)</option>
        </select>
    </div>
    <input type="submit" value="Buscar">
</form>
</div>

<?php

 }
 else{
    ?>
    <h2 class="encabezado">Búsqueda</h2>
<form action="<?php
    if($_GET["pag"]==3){
    echo "?pag=3";
    }
    if($_GET["pag"]==4){
        echo "?pag=4";
    }
    ?>" method="post" class="form-busqueda">
    <div class="input-busc">
        <label>Palabra: </label>
        <input type="text" value="<?php if(isset($nombre)){echo $nombre;} ?>" name="nombre">
    </div>
    <div class="input-busc">
        <label>Ordenar: </label>
        <select name="ordenar">
            <option value="0">Sin ordenar</option>
            <option value="1">A-Z(Nombre)</option>
            <option value="2">A-Z(Descripción)</option>
            <option value="3">Z-A(Nombre)</option>
            <option value="4">Z-A(Descripción)</option>
        </select>
    </div>
    <input type="submit" value="Buscar">
</form>
    <?php
 }

?>