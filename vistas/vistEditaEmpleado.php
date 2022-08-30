<div class="contenedor-principal">
<?php
            if(isset($_GET["clv"])&&!empty($_GET["clv"])){
                ?>
    <h2 class="encabezado">Editar empleado</h2>
    <form action="?pag=8" method="post" class="form-inputs-muchos">
       <?php
                $query='select * from tbempleados where clave="'.$_GET['clv'].'"';
                $resultado=mysqli_query(conecta(),$query);//clave,nombre,numero,curp,rfc,direccion,ncuenta,puesto,fecha
                while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                            <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
                            <div class="container-inputs">
                                <label>Clave: </label>
                                <input readonly type="text" value="<?php echo $mostrar['clave']; ?>" name="clave"> 
                                <label>Nombre completo: *</label>
                                <input type="text" name="nombre" value="<?php echo $mostrar['nombre']; ?>" placeholder="Ej. Juan López Pérez">
                                <label>Número telefónico: *</label>   
                                <input type="tel" placeholder="Ej. 2294774177" value="<?php echo $mostrar['numero']; ?>" name="telEmpleado">
                                <label>CURP: *</label>
                                <input type="text" name="curp" value="<?php echo $mostrar['curp']; ?>" size="18" maxlength="18">
                                <label>RFC: *</label>
                                <input type="text" name="rfc" value="<?php echo $mostrar['rfc']; ?>" sie="20" maxlength="20">
                                <label>Número de cuenta: *</label>
                                <input type="text" name="numeroCuenta" value="<?php echo $mostrar['numero_cuenta']; ?>">
                                <label>Puesto: *</label>
                                <select name="puesto">
                                    <option value="0">Seleccione</option>
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
                                <label>Fecha de nacimiento: *</label>
                                <input type="date" name="fecha" value="<?php echo $mostrar['fecha']; ?>">
                            </div>
                            <div class="container-buttons">
                                <input type="submit" name="editaEmpleado" value="Guardar cambios">
                            </div>
                    <?php
                }
        ?>
    
    </form>
    <?php 
            }
    ?>
</div>