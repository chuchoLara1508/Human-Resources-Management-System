<div class="contenedor-principal">
<?php
          if(isset($_GET["clv"])&&!empty($_GET["clv"])){
            ?>
    <h2 class="encabezado">Editar incapacidad</h2>
    <form action="?pag=10" method="post" class="form-inputs-muchos">
        <?php
                $query='select * from tbincapacidades where clave="'.$_GET['clv'].'"';
                $resultado=mysqli_query(conecta(),$query);
                while($mostrar=mysqli_fetch_array($resultado)){
                    ?>
                        <span class="nota-form">Nota: los campos marcados con * son obligatorios</span>
                        <div class="container-inputs">
                            <label>Clave: </label>
                            <input readonly type="text" value="<?php echo $mostrar['clave']; ?>" name="clave">
                            <label>Nombre: *</label>
                            <input type="text" maxlength="25" name="nombreInc" value="<?php echo $mostrar['nombre']; ?>">
                            <label>Descuento: *</label>
                            <input type="number" name="descInc" min="0" max="100" value="<?php echo $mostrar['descuento'] ?>">
                        </div>
                        <div class="container-buttons">
                            <input type="submit" value="Guardar cambios" name="editarInc">
                        </div>
                    <?php
                }
        ?>
    </form>
    <?php 
          }
    ?>
</div>