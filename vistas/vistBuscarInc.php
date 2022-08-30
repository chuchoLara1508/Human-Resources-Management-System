<?php 
 $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
 $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
 $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
 if($arr1[5]==0){
?>
<div class="contenedor-principal">
            <h2 class="encabezado">Búsqueda</h2>
<form action="?pag=9" method="post" class="form-busqueda">
        <div class="input-busc">
            <label>Palabra: </label>
            <input type="text" name="nombre">
        </div>
        <div class="input-busc">
            <label>Rango de descuento</label>
            <select name="descuento">
                <option value="0">Todos</option>
                <option value="1"><20%</option>
                <option value="2">>=20% | <40%</option>
                <option value="3">>=40% | <60%</option>
                <option value="4">>=60% | <80%</option>
                <option value="5">>=80% | <=100%</option>
            </select>
        </div>
        <div class="input-busc">
            <label>Ordenar: </label>
            <select name="ordenar" id="">
                <option value="0">Sin ordenar</option>
                <option value="1">A-Z(Nombre)</option>
                <option value="2">ASC(Descuento)</option>
                <option value="3">Z-A(Nombre)</option>
                <option value="4">DESC(Descuento)</option>
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
<form action="?pag=9" method="post" class="form-busqueda">
        <div class="input-busc">
            <label>Palabra: </label>
            <input type="text" name="nombre">
        </div>
        <div class="input-busc">
            <label>Rango de descuento</label>
            <select name="descuento">
                <option value="0">Todos</option>
                <option value="1"><20%</option>
                <option value="2">>=20% | <40%</option>
                <option value="3">>=40% | <60%</option>
                <option value="4">>=60% | <80%</option>
                <option value="5">>=80% | <=100%</option>
            </select>
        </div>
        <div class="input-busc">
            <label>Ordenar: </label>
            <select name="ordenar" id="">
                <option value="0">Sin ordenar</option>
                <option value="1">A-Z(Nombre)</option>
                <option value="2">ASC(Descuento)</option>
                <option value="3">Z-A(Nombre)</option>
                <option value="4">DESC(Descuento)</option>
            </select>
        </div>
    <input type="submit" value="Buscar">
</form>
   <?php
 }