<?php 
 $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
 $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
 $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
 if($arr1[0]==0){
?>
<div class="contenedor-principal">
            <h2 class="encabezado">Búsqueda</h2>
<form action="?pag=5" method="post" class="form-busqueda">
        <div class="input-busc">
            <label>Palabra: </label>
            <input type="text" value="<?php if(isset($pal)){ echo $pal; } ?>" name="nombre">
        </div>
        <div class="input-busc">
            <label>Rango de pago:</label>
            <select name="pago">
                <option value="0" <?php if($pago==0){ echo 'selected'; } ?>>Todos</option>
                <option value="1" <?php if($pago==1){ echo 'selected'; } ?>>=$20 | <$40</option>
                <option value="2" <?php if($pago==2){ echo 'selected'; } ?>>=$40 | <$60</option>
                <option value="3" <?php if($pago==3){ echo 'selected'; } ?>>>=$60 | <$80</option>
                <option value="4" <?php if($pago==4){ echo 'selected'; } ?>>>=$80 | <=$100</option>
            </select>
        </div>
        <div class="input-busc">
            <label>Ordenar:</label>
            <select name="ordenar" id="">
                <option value="0">Sin ordenar</option>
                <option value="1">A-Z(Nombre)</option>
                <option value="2">A-Z(Descripción)</option>
                <option value="3">A-Z(Departamento)</option>
                <option value="4">ASC(Pago)</option>
                <option value="5">Z-A(Nombre)</option>
                <option value="6">Z-A(Descripción)</option>
                <option value="7">Z-A(Departamento)</option>
                <option value="8">DESC(Pago)</option>
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
<form action="?pag=5" method="post" class="form-busqueda">
        <div class="input-busc">
            <label>Palabra: </label>
            <input type="text" value="<?php if(isset($pal)){ echo $pal; } ?>" name="nombre">
        </div>
        <div class="input-busc">
            <label>Rango de pago:</label>
            <select name="pago">
                <option value="0" <?php if($pago==0){ echo 'selected'; } ?>>Todos</option>
                <option value="1" <?php if($pago==1){ echo 'selected'; } ?>>=$20 | <$40</option>
                <option value="2" <?php if($pago==2){ echo 'selected'; } ?>>=$40 | <$60</option>
                <option value="3" <?php if($pago==3){ echo 'selected'; } ?>>>=$60 | <$80</option>
                <option value="4" <?php if($pago==4){ echo 'selected'; } ?>>>=$80 | <=$100</option>
            </select>
        </div>
        <div class="input-busc">
            <label>Ordenar:</label>
            <select name="ordenar" id="">
                <option value="0">Sin ordenar</option>
                <option value="1">A-Z(Nombre)</option>
                <option value="2">A-Z(Descripción)</option>
                <option value="3">A-Z(Departamento)</option>
                <option value="4">ASC(Pago)</option>
                <option value="5">Z-A(Nombre)</option>
                <option value="6">Z-A(Descripción)</option>
                <option value="7">Z-A(Departamento)</option>
                <option value="8">DESC(Pago)</option>
            </select>
        </div>
        <input type="submit" value="Buscar">
</form>
     <?php
 }