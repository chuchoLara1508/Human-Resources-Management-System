<?php 
 $arr1=guardarRolesPermisos($_SESSION["clvrol"]);//dar de alta
 $arr2=actualizarRolesPermisos($_SESSION["clvrol"]);//actualizar
 $arr3=eliminarRolesPermisos($_SESSION["clvrol"]);//eliminar
 if($arr1[1]==0){
?>
<div class="contenedor-principal">
            <h2 class="encabezado">Búsqueda</h2>
<form action="?pag=11" method="post" class="form-busqueda">
        <div class="input-busc">
            <label>Nombre empleado: </label>
            <input type="text" name="nomb">
        </div>
        <div class="input-busc">
            <label>Puesto: </label>
            <select name="puest">
                <option value="0">Todos</option>
                <?php
                                    $query='select * from tbpuestos';
                                    if($querySQL=mysqli_query(conecta(),$query)){
                                        $cont=1;
                                        while($res=mysqli_fetch_assoc($querySQL)){
                                ?>
                                <option value="<?php echo $cont; ?>"
                                <?php
                
                                ?>
                                ><?php echo $res["nombre"]; ?></option>
                                <?php
                                            $cont++;
                                        }
                                    }
                                ?>
            </select>
        </div>
        <div class="input-busc">
            <label>Rango de días trabajados: </label>
            <select name="dia">
                <option value="0">Todos</option>
                <option value="1"><15</option>
                <option value="2">>=15 | <30</option>
                <option value="3">>=30</option>
            </select>
        </div>
        <div class="input-busc">
            <label>Ordenar:</label>
            <select name="ordenar" id="">
                <option value="0">Sin ordenar</option>
                <option value="1">A-Z(Nombre)</option>
                <option value="2">A-Z(Puesto)</option>
                <option value="3">ASC(Pago)</option>
                <option value="4">Z-A(Nombre)</option>
                <option value="5">Z-A(Puesto)</option>
                <option value="6">DESC(Pago)</option>
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
<form action="?pag=11" method="post" class="form-busqueda">
        <div class="input-busc">
            <label>Nombre empleado: </label>
            <input type="text" name="nomb">
        </div>
        <div class="input-busc">
            <label>Puesto: </label>
            <select name="puest">
                <option value="0">Todos</option>
                <?php
                                    $query='select * from tbpuestos';
                                    if($querySQL=mysqli_query(conecta(),$query)){
                                        $cont=1;
                                        while($res=mysqli_fetch_assoc($querySQL)){
                                ?>
                                <option value="<?php echo $cont; ?>"
                                <?php
                
                                ?>
                                ><?php echo $res["nombre"]; ?></option>
                                <?php
                                            $cont++;
                                        }
                                    }
                                ?>
            </select>
        </div>
        <div class="input-busc">
            <label>Rango de días trabajados: </label>
            <select name="dia">
                <option value="0">Todos</option>
                <option value="1"><15</option>
                <option value="2">>=15 | <30</option>
                <option value="3">>=30</option>
            </select>
        </div>
        <div class="input-busc">
            <label>Ordenar:</label>
            <select name="ordenar" id="">
                <option value="0">Sin ordenar</option>
                <option value="1">A-Z(Nombre)</option>
                <option value="2">A-Z(Puesto)</option>
                <option value="3">ASC(Pago)</option>
                <option value="4">Z-A(Nombre)</option>
                <option value="5">Z-A(Puesto)</option>
                <option value="6">DESC(Pago)</option>
            </select>
        </div>
        <input type="submit" value="Buscar">
</form>
     <?php
 }