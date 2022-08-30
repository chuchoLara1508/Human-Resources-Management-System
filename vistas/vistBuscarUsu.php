<?php
    $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
    $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
    $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
    if($arr1[3]==0){
        ?>
        <div class="contenedor-principal">
            <h2 class="encabezado">Búsqueda</h2>
<form action="?pag=16" method="post" class="form-busqueda">
    <div class="input-busc">
        <label>Nombre: </label>
        <input type="text" name="nom" id="">
    </div>
    <div class="input-busc">
        <label>Usuario: </label>
        <input type="text" name="usua">
    </div>
    <div class="input-busc">
        <label>Correo: </label>
        <input type="text" name="corr">
    </div>
    <div class="input-busc">
        <label>Ordenar: </label>
        <select name="ordenar" id="">
            <option value="0">Sin ordenar</option>
            <option value="1">A-Z(Nombre)</option>
            <option value="2">A-Z(Usuario)</option>
            <option value="3">Z-A(Nombre)</option>
            <option value="4">Z-A(Usuario)</option>
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
        <form action="?pag=16" method="post" class="form-busqueda">
    <div class="input-busc">
        <label>Nombre: </label>
        <input type="text" name="nom" id="">
    </div>
    <div class="input-busc">
        <label>Usuario: </label>
        <input type="text" name="usua">
    </div>
    <div class="input-busc">
        <label>Correo: </label>
        <input type="text" name="corr">
    </div>
    <div class="input-busc">
        <label>Ordenar: </label>
        <select name="ordenar" id="">
            <option value="0">Sin ordenar</option>
            <option value="1">A-Z(Nombre)</option>
            <option value="2">A-Z(Usuario)</option>
            <option value="3">Z-A(Nombre)</option>
            <option value="4">Z-A(Usuario)</option>
        </select>
    </div>
    <input type="submit" value="Buscar">
</form>
        <?php
    }